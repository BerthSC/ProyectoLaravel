<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan - Editar Gasto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Editar Gasto</h1>
    <a href="{{ route('gastos.create') }}" class="btn btn-ejidal">Nuevo Gasto</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card card-ejidal">
<div class="card-header card-header-ejidal">Gasto ID {{ $gasto->idGasto }}</div>
<div class="card-body">

<form method="POST" action="{{ route('gastos.update', $gasto->idGasto) }}">
@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <label>Responsable</label>
        <input type="text" name="responsable" class="form-control" value="{{ $gasto->responsable }}" required>
    </div>

    <div class="col-md-6">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" value="{{ $gasto->fecha }}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Monto</label>
        <input type="number" step="0.01" name="monto" class="form-control" value="{{ $gasto->monto }}" required>
    </div>

    <div class="col-md-4">
        <label>Medida</label>
        <input type="text" name="medida" class="form-control" value="{{ $gasto->medida }}" required>
    </div>

    <div class="col-md-4">
        <label>Concepto</label>
        <input type="text" name="concepto" class="form-control" value="{{ $gasto->concepto }}" required>
    </div>
</div>

<div class="text-end">
    <button class="btn btn-ejidal">Actualizar</button>
</div>

</form>

</div>
</div>

</main>

@include('IncludeViews.pie')

</body>
</html>
