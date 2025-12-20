<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index(Request $request)
{
    $query = Gasto::query();

    if ($request->filled('responsable')) {
        $query->where('responsable', 'like', '%' . $request->responsable . '%');
    }

    if ($request->filled('concepto')) {
        $query->where('concepto', 'like', '%' . $request->concepto . '%');
    }

    if ($request->filled('fecha')) {
        $query->whereDate('fecha', $request->fecha);
    }

    $gastos = $query->orderBy('fecha', 'desc')->get();

    return view('ListViews.consultaGasto', compact('gastos'));
}



    public function create()
    {
        return view('RegisterViews.nuevoGasto');
    }

    public function store(Request $request)
{
    $request->validate([
        'responsable' => 'required|string',
        'fecha' => 'required|date',
        'monto' => 'required|numeric',
        'medida' => 'required|string',
        'concepto' => 'required|string'
    ]);

    Gasto::create([
        'responsable' => $request->responsable,
        'fecha' => $request->fecha,
        'monto' => $request->monto,
        'medida' => $request->medida,
        'concepto' => $request->concepto
    ]);

    return redirect()
        ->back()
        ->with('success', 'Gasto registrado correctamente');
}


    public function edit($id)
    {
        $gasto = Gasto::findOrFail($id);
        return view('EditViews.editarGasto', compact('gasto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'responsable' => 'required',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'concepto' => 'required',
            'medida' => 'required'
        ]);

        $gasto = Gasto::findOrFail($id);
        $gasto->update($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente');
    }

    public function destroy($id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado correctamente');
    }
}
