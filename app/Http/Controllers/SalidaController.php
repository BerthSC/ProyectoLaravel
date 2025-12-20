<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entrada;
use App\Models\Salida;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::with('articulo')
            ->orderBy('fecha_salida', 'desc')
            ->get();

        return view('ListViews.ListadoSalidas', compact('salidas'));
    }

    public function create()
    {
        $articulos = Articulo::orderBy('descripcion')->get();
        return view('RegisterViews.nuevaSalida', compact('articulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_equipo' => 'required|exists:articulos,id_equipo',
            'cantidad' => 'required|integer|min:1',
            'fecha_salida' => 'required|date',
            'tipo_salida' => 'required|string',
            'responsable' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        DB::transaction(function () use ($request) {

            Salida::create($request->all());

            DB::table('articulos')
                ->where('id_equipo', $request->id_equipo)
                ->decrement('cantidad', $request->cantidad);
        });

        return redirect(url('salidas'))
            ->with('success', 'Salida registrada correctamente');
    }

    public function edit($id)
    {
        $salida = Salida::findOrFail($id);
        $articulos = Articulo::orderBy('descripcion')->get();

        return view('EditViews.EditarSalida', compact('salida', 'articulos'));
    }

    public function update(Request $request, $id)
    {
        $salida = Salida::findOrFail($id);

        $request->validate([
            'id_equipo' => 'required|exists:articulos,id_equipo',
            'cantidad' => 'required|integer|min:1',
            'fecha_salida' => 'required|date',
            'tipo_salida' => 'required|string',
            'responsable' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        DB::transaction(function () use ($request, $salida) {

            DB::table('articulos')
                ->where('id_equipo', $salida->id_equipo)
                ->increment('cantidad', $salida->cantidad);

            DB::table('articulos')
                ->where('id_equipo', $request->id_equipo)
                ->decrement('cantidad', $request->cantidad);

            $salida->update($request->all());
        });

        return redirect(url('salidas'))
            ->with('success', 'Salida actualizada correctamente');
    }

    public function destroy($id)
    {
        $salida = Salida::findOrFail($id);

        DB::table('articulos')
            ->where('id_equipo', $salida->id_equipo)
            ->increment('cantidad', $salida->cantidad);

        $salida->delete();

        return redirect(url('salidas'))
            ->with('success', 'Salida eliminada');
    }
    public function reporteEyS()
{
    $entradas = Entrada::with('articulo')
        ->orderBy('fecha_entrada', 'desc')
        ->get();

    $salidas = Salida::with('articulo')
        ->orderBy('fecha_salida', 'desc')
        ->get();

    return view('ReportViews.reporteEyS', compact('entradas', 'salidas'));
}
}
