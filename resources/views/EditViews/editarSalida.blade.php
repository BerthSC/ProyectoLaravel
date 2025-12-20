<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Salida</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Editar Salida</h1>
    <a href="{{ route('salidas.index') }}" class="btn btn-ejidal">Listado</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card card-ejidal">
<div class="card-header card-header-ejidal">Actualizar Salida</div>
<div class="card-body">

<form method="POST" action="{{ route('salidas.update', $salida->id_salida) }}">
@csrf
@method('PUT')

<div class="row mb-3">
    <div class="col-md-6">
        <label>Artículo</label>
        <select name="id_equipo" class="form-control" required>
            @foreach($articulos as $a)
                <option value="{{ $a->id_equipo }}"
                    {{ $a->id_equipo == $salida->id_equipo ? 'selected' : '' }}>
                    {{ $a->descripcion }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>Cantidad</label>
        <input type="number"
               name="cantidad"
               class="form-control"
               value="{{ $salida->cantidad }}"
               required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Fecha de salida</label>
        <input type="date"
               name="fecha_salida"
               class="form-control"
               value="{{ $salida->fecha_salida }}"
               required>
    </div>

    <div class="col-md-6">
        <label>Tipo de salida</label>
        <input type="text"
               name="tipo_salida"
               class="form-control"
               value="{{ $salida->tipo_salida }}"
               required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Responsable</label>
        <input type="text"
               name="responsable"
               class="form-control"
               value="{{ $salida->responsable }}"
               required>
    </div>

    <div class="col-md-6">
        <label>Observaciones</label>
        <textarea name="observaciones"
                  class="form-control">{{ $salida->observaciones }}</textarea>
    </div>
</div>

<div class="text-end">
    <button class="btn btn-ejidal">Actualizar Salida</button>
</div>

</form>

</div>
</div>

</main>

@include('IncludeViews.pie')

</body>
</html>
