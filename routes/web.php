<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelaController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;



Route::get('/principal', function () {
    return view('AuthViews.principal'); 
})->name('principal');

Route::get('/nuevoE', function(){
    return view('RegisterViews/nuevoEjidatario');
});


Route::get('/listadoEjidatarios', function(){
    return view('ListViews/listadoEjidatarios');
});



Route::get('/nuevaParcela', [ParcelaController::class, 'create'])->name('parcelas.create');
Route::post('/nuevaParcela', [ParcelaController::class, 'store'])->name('parcelas.store');
Route::get('/verParcela', [ParcelaController::class, 'verParcela'])->name('parcelas.ver');
Route::get('/editarParcela/{id}', [ParcelaController::class, 'editarParcela'])->name('parcelas.editar');
Route::post('/parcela/actualizar', [ParcelaController::class, 'actualizarParcela'])->name('parcelas.actualizar');
Route::get('/parcelas', [ParcelaController::class, 'index'])->name('parcelas.index');

Route::get('/gastos', [GastoController::class, 'index'])->name('gastos.index');
Route::get('/gastos/nuevo', [GastoController::class, 'create'])->name('gastos.create');
Route::post('/gastos', [GastoController::class, 'store'])->name('gastos.store');
Route::post('/gastos/buscar', [GastoController::class, 'buscar'])->name('gastos.buscar');
Route::get('/gastos/{id}/editar', [GastoController::class, 'edit'])->name('gastos.edit');
Route::post('/gastos/{id}', [GastoController::class, 'update'])->name('gastos.update');
Route::post('/gastos/{id}/eliminar', [GastoController::class, 'destroy'])->name('gastos.destroy');

Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
Route::get('/articulos/nuevo', [ArticuloController::class, 'create'])->name('articulos.create');
Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');
Route::get('/articulos/buscar', [ArticuloController::class, 'buscar'])->name('articulos.buscar');
Route::get('/articulos/{id}/editar', [ArticuloController::class, 'edit'])->name('articulos.edit');
Route::post('/articulos/{id}', [ArticuloController::class, 'update'])->name('articulos.update');
Route::post('/articulos/{id}/eliminar', [ArticuloController::class, 'destroy'])->name('articulos.destroy');
Route::get('/articulos/reporte', [ArticuloController::class, 'reporte'])->name('articulos.reporte');


Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas.index');
Route::get('/entradas/nueva', [EntradaController::class, 'create'])->name('entradas.create');
Route::post('/entradas/guardar', [EntradaController::class, 'store'])->name('entradas.store');
Route::get('/entradas/editar/{id}', [EntradaController::class, 'edit'])->name('entradas.edit');
Route::put('/entradas/actualizar/{id}', [EntradaController::class, 'update'])->name('entradas.update');
Route::delete('/entradas/eliminar/{id}', [EntradaController::class, 'destroy'])->name('entradas.destroy');



Route::get('salidas', [SalidaController::class, 'index'])->name('salidas.index');
Route::get('salidas/nueva', [SalidaController::class, 'create'])->name('salidas.create');
Route::post('salidas/guardar', [SalidaController::class, 'store'])->name('salidas.store');
Route::get('salidas/editar/{id}', [SalidaController::class, 'edit'])->name('salidas.edit');
Route::put('salidas/actualizar/{id}', [SalidaController::class, 'update'])->name('salidas.update');
Route::delete('salidas/eliminar/{id}', [SalidaController::class, 'destroy'])->name('salidas.destroy');
Route::get('reporte/entradas-salidas',[SalidaController::class, 'reporteEyS'])->name('reporte.eys');