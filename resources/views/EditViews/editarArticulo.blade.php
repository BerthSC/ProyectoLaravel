<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Artículo - Ejido San Rafael Ixtapalucan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between align-items-center border-bottom mb-3">
    <h1 class="h2 text-ejidal">Editar Artículo</h1>
    <a href="{{ route('articulos.index') }}" class="btn btn-ejidal">Listado</a>
</div>

<div class="card card-ejidal">
<div class="card-header card-header-ejidal">
    Edición de Artículo
</div>
<div class="card-body">

<form method="POST" action="{{ route('articulos.update', $articulo->id_equipo) }}">
@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <label>Descripción</label>
        <input type="text"
               name="descripcion"
               class="form-control"
               value="{{ $articulo->descripcion }}"
               required>
    </div>

    <div class="col-md-3">
        <label>Cantidad</label>
        <input type="number"
               name="cantidad"
               class="form-control"
               value="{{ $articulo->cantidad }}"
               required>
    </div>

    <div class="col-md-3">
        <label>Medida</label>
        <input type="text"
               name="medida"
               class="form-control"
               value="{{ $articulo->medida }}"
               required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Estado</label>
        <input type="text"
               name="estado"
               class="form-control"
               value="{{ $articulo->estado }}"
               required>
    </div>

    <div class="col-md-6">
        <label>Fecha de registro</label>
        <input type="date"
               name="fecha_registro"
               class="form-control"
               value="{{ $articulo->fecha_registro }}">
    </div>
</div>

<div class="text-end">
    <button class="btn btn-ejidal">
        Actualizar Artículo
    </button>
</div>

</form>

</div>
</div>

</main>

@include('IncludeViews.pie')
</body>
</html>
