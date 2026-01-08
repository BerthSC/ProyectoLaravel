<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Artículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Nuevo Artículo</h1>
    <a href="{{ route('articulos.index') }}" class="btn btn-ejidal">Listado</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card card-ejidal">
<div class="card-header card-header-ejidal">
    Registrar Artículo
</div>

<div class="card-body">

<form method="POST" action="{{ route('articulos.store') }}">
@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <label>Descripción</label>
        <input type="text" name="descripcion" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Medida</label>
        <input type="text" name="medida" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Fecha de registro</label>
        <input type="date" name="fecha_registro" class="form-control" required>
    </div>
</div>

<div class="text-end">
    <button class="btn btn-ejidal">
        Guardar Artículo
    </button>
</div>

</form>

</div>
</div>

</main>

@include('IncludeViews.pie')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
