<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::orderBy('fecha_registro', 'desc')->get();
        return view('ListViews.consultaArticulo', compact('articulos'));
    }

    public function create()
    {
        return view('RegisterViews.nuevoArticulo');
    }

    public function store(Request $request)
{
    $request->validate([
        'descripcion' => 'required|string',
        'cantidad' => 'required|numeric',
        'estado' => 'required|string',
        'medida' => 'required|string',
        'fecha_registro' => 'nullable|date'
    ]);

    Articulo::create([
        'descripcion' => $request->descripcion,
        'cantidad' => $request->cantidad,
        'estado' => $request->estado,
        'medida' => $request->medida,
        'fecha_registro' => $request->fecha_registro
    ]);

    return redirect()
        ->back()
        ->with('success', 'Artículo registrado correctamente');
}


    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('EditViews.editarArticulo', compact('articulo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'cantidad' => 'required|numeric',
            'estado' => 'required|string',
            'medida' => 'required|string',
            'fecha_registro' => 'nullable|date'
        ]);

        $articulo = Articulo::findOrFail($id);
        $articulo->update($request->all());

        return redirect()
            ->route('articulos.index')
            ->with('success', 'Artículo actualizado correctamente');
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();

        return redirect()
            ->route('articulos.index')
            ->with('success', 'Artículo eliminado correctamente');
    }

   public function buscar(Request $request)
{
    $articulos = Articulo::query()

        ->when($request->descripcion, function ($q) use ($request) {
            $q->where('descripcion', 'like', '%' . $request->descripcion . '%');
        })

        ->when($request->estado, function ($q) use ($request) {
            $q->where('estado', 'like', '%' . $request->estado . '%');
        })

        ->when($request->fecha_registro, function ($q) use ($request) {
            $q->whereDate('fecha_registro', $request->fecha_registro);
        })

        ->orderBy('fecha_registro', 'desc')
        ->get();

    return view('ListViews.consultaArticulo', compact('articulos'));
}

public function reporte()
{
    $articulos = Articulo::orderBy('fecha_registro', 'desc')->get();

    return view('ReportViews.reporteArticulo', compact('articulos'));
}


}
