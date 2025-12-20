<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ejidatario;
use App\Models\TipoUsoSuelo;
use App\Models\Parcela;
use App\Models\Coordenada;
use App\Models\Colindancia;
use App\Models\InfAdmin;

class ParcelaController extends Controller
{
    // Mostrar formulario para crear nueva parcela
    public function create(Request $request)
    {
        $ejidatario = null;
        $error = null;

        if ($request->filled('numeroEjidatario')) {
            $ejidatario = Ejidatario::where('numeroEjidatario', $request->numeroEjidatario)->first();
            if (!$ejidatario) {
                $error = 'No se encontró un ejidatario con ese número.';
            }
        }

        return view('RegisterViews.nuevaParcela', [
            'ejidatario' => $ejidatario,
            'usos' => TipoUsoSuelo::all(),
            'error' => $error
        ]);
    }

    // Guardar nueva parcela
    public function store(Request $request)
    {
        $request->validate([
            'numeroEjidatario' => 'required',
            'noParcela' => 'required',
            'superficie' => 'required|string',
            'usoSuelo' => 'required',
            'ubicacion' => 'required',
            'norte' => 'required',
            'sur' => 'required',
            'este' => 'required',
            'oeste' => 'required',
            'noreste' => 'required',
            'noroeste' => 'required',
            'sureste' => 'required',
            'suroeste' => 'required',
            'num_inscripcionRAN' => 'required',
            'claveNucleoAgrario' => 'required',
            'comunidad' => 'required',
            'fechaExpedicion' => 'required|date',
            'punto.0' => 'required',
            'coordenadaX.0' => 'required',
            'coordenadaY.0' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $ejidatario = Ejidatario::where('numeroEjidatario', $request->numeroEjidatario)->first();
            if (!$ejidatario) {
                return back()->with('status', 'error')->with('mensaje', 'Ejidatario no encontrado.')->withInput();
            }

            $parcela = Parcela::create([
                'noParcela' => $request->noParcela,
                'superficie' => $request->superficie,
                'idUso' => $request->usoSuelo,
                'ubicacion' => $request->ubicacion,
                'idEjidatario' => $ejidatario->idEjidatario
            ]);

            foreach ($request->punto as $i => $p) {
                if (empty($p) || empty($request->coordenadaX[$i]) || empty($request->coordenadaY[$i])) continue;
                Coordenada::create([
                    'idParcela' => $parcela->idParcela,
                    'punto' => $p,
                    'coordenadaX' => $request->coordenadaX[$i],
                    'coordenadaY' => $request->coordenadaY[$i],
                ]);
            }

            Colindancia::create([
                'idParcela' => $parcela->idParcela,
                'norte' => $request->norte,
                'sur' => $request->sur,
                'este' => $request->este,
                'oeste' => $request->oeste,
                'noreste' => $request->noreste,
                'noroeste' => $request->noroeste,
                'sureste' => $request->sureste,
                'suroeste' => $request->suroeste,
            ]);

            InfAdmin::create([
                'idParcela' => $parcela->idParcela,
                'num_inscripcionRAN' => $request->num_inscripcionRAN,
                'claveNucleoAgrario' => $request->claveNucleoAgrario,
                'comunidad' => $request->comunidad,
                'fechaExpedicion' => $request->fechaExpedicion,
            ]);

            DB::commit();
            return redirect()->route('parcelas.create')->with('status', 'success')->with('mensaje', 'Parcela registrada correctamente.');

        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('status', 'error')->with('mensaje', 'Error al guardar la información.')->withInput();
        }
    }

    // Buscar parcela desde nuevaParcela
public function verParcela(Request $request)
{
    $request->validate([
        'noParcela' => 'required|numeric'
    ]);

    $parcela = Parcela::where('noParcela', $request->noParcela)->first();

    // ❌ NO EXISTE → mensaje
    if (!$parcela) {
        return redirect()
            ->route('parcelas.create')
            ->with('parcela_error', 'No se encontró ninguna parcela con ese número.');
    }

    // ✅ EXISTE → abre editar directamente
    return redirect()->route('parcelas.editar', $parcela->idParcela);
}



    // Mostrar formulario para editar
    public function editarParcela($id)
    {
        $parcela = Parcela::with(['ejidatario', 'colindancia', 'coordenadas', 'infAdmin'])->findOrFail($id);
        $ejidatario = $parcela->ejidatario;
        $colindancia = $parcela->colindancia;
        $coordenadas = $parcela->coordenadas;
        $infAdmin = $parcela->infAdmin;
        $usos = TipoUsoSuelo::all();

        return view('EditViews.editarParcela', compact('parcela','ejidatario','colindancia','coordenadas','infAdmin','usos'));
    }

    // Actualizar datos de la parcela
    public function actualizarParcela(Request $request)
    {
        $parcela = Parcela::findOrFail($request->idParcela);

        DB::beginTransaction();
        try {
            $parcela->update([
                'noParcela' => $request->noParcela,
                'superficie' => $request->superficie,
                'idUso' => $request->usoSuelo,
                'ubicacion' => $request->ubicacion,
            ]);

            if($parcela->colindancia){
                $parcela->colindancia->update($request->only(['norte','sur','este','oeste','noreste','noroeste','sureste','suroeste']));
            }

            foreach($request->coordenadas as $c){
                $coordenada = Coordenada::find($c['idCoordenada']);
                if($coordenada){
                    $coordenada->update([
                        'punto' => $c['punto'],
                        'coordenadaX' => $c['coordenadaX'],
                        'coordenadaY' => $c['coordenadaY']
                    ]);
                }
            }

            if($parcela->infAdmin){
                $parcela->infAdmin->update($request->only(['num_inscripcionRAN','claveNucleoAgrario','comunidad','fechaExpedicion']));
            }

            DB::commit();
            return back()->with('success', 'Información actualizada correctamente.');

        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar la información.');
        }
    }

    public function index()
{
    $parcelas = Parcela::leftJoin('ejidatarios as e', 'e.idEjidatario', '=', 'parcelas.idEjidatario')
        ->select(
            'parcelas.noParcela',
            'parcelas.ubicacion',
            DB::raw("CONCAT(e.nombre, ' ', e.apellidoPaterno, ' ', e.apellidoMaterno) AS ejidatario")
        )
        ->orderBy('parcelas.noParcela')
        ->get();

    return view('ListViews.listadoParcelas', compact('parcelas'));
}

}
