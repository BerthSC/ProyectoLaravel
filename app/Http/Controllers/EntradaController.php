<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with('articulo')
            ->orderBy('fecha_entrada', 'desc')
            ->get();

        return view('ListViews.listadoEntradas', compact('entradas'));
    }

    public function create()
    {
        $articulos = Articulo::orderBy('descripcion')->get();
        return view('RegisterViews.nuevaEntrada', compact('articulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_equipo' => 'required|exists:articulos,id_equipo',
            'cantidad' => 'required|integer|min:1',
            'fecha_entrada' => 'required|date',
            'observaciones' => 'nullable|string'
        ]);

        DB::transaction(function () use ($request) {

            // 1. registrar la entrada
            Entrada::create([
                'id_equipo' => $request->id_equipo,
                'cantidad' => $request->cantidad,
                'fecha_entrada' => $request->fecha_entrada,
                'observaciones' => $request->observaciones
            ]);

            // 2. sumar al artículo
            $articulo = Articulo::where('id_equipo', $request->id_equipo)->first();

            $articulo->cantidad = $articulo->cantidad + $request->cantidad;
            $articulo->save();
        });

        return redirect()
            ->route('entradas.create')
            ->with('success', 'Entrada registrada y sumada al artículo correctamente');
    }

    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $articulos = Articulo::orderBy('descripcion')->get();

        return view('EditViews.editarEntrada', compact('entrada', 'articulos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_equipo' => 'required|exists:articulos,id_equipo',
            'cantidad' => 'required|integer|min:1',
            'fecha_entrada' => 'required|date',
            'observaciones' => 'nullable|string'
        ]);

        $entrada = Entrada::findOrFail($id);

        DB::transaction(function () use ($request, $entrada) {

            // revertir cantidad anterior
            $articuloAnterior = Articulo::where('id_equipo', $entrada->id_equipo)->first();
            $articuloAnterior->cantidad -= $entrada->cantidad;
            $articuloAnterior->save();

            // actualizar entrada
            $entrada->update([
                'id_equipo' => $request->id_equipo,
                'cantidad' => $request->cantidad,
                'fecha_entrada' => $request->fecha_entrada,
                'observaciones' => $request->observaciones
            ]);

            // sumar nueva cantidad
            $articuloNuevo = Articulo::where('id_equipo', $request->id_equipo)->first();
            $articuloNuevo->cantidad += $request->cantidad;
            $articuloNuevo->save();
        });

        return redirect()
            ->route('entradas.index')
            ->with('success', 'Entrada actualizada correctamente');
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);

        DB::transaction(function () use ($entrada) {

            // restar la entrada del artículo
            $articulo = Articulo::where('id_equipo', $entrada->id_equipo)->first();
            $articulo->cantidad -= $entrada->cantidad;
            $articulo->save();

            // eliminar entrada
            $entrada->delete();
        });

        return redirect()
            ->route('entradas.index')
            ->with('success', 'Entrada eliminada correctamente');
    }
}
