<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>
    @include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Nuevo Gasto</h1>
    <a href="{{ route('gastos.index') }}" class="btn btn-ejidal">Listado</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card card-ejidal">
<div class="card-header card-header-ejidal">Registro de Gasto</div>
<div class="card-body">

<form method="POST" action="{{ route('gastos.store') }}">
@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <label>Responsable</label>
        <input type="text" name="responsable" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Monto</label>
        <input type="number" step="0.01" name="monto" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Medida</label>
        <input type="text" name="medida" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Concepto</label>
        <input type="text" name="concepto" class="form-control" required>
    </div>
</div>

<div class="text-end">
    <button class="btn btn-ejidal">Guardar Gasto</button>
</div>

</form>

</div>
</div>

</main>

@include('IncludeViews.pie')
</body>
</html>
