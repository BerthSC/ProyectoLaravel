<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan - Nueva Parcela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')

<div class="container-fluid">
<div class="row">

@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Nueva Parcela</h1>

    <a href="{{ route('parcelas.index') }}" class="btn btn-ejidal">
        Ir al listado
    </a>
</div>


@if($error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endif

@if(session('status') === 'success')
<div class="alert alert-success">
    Información guardada correctamente.
</div>
@endif

@if(session('status') === 'error')
<div class="alert alert-danger">
    {{ session('mensaje') }}
</div>
@endif

<!-- BUSCADOR DE PARCELA -->
<form method="GET" action="{{ route('parcelas.ver') }}" class="mb-4">
    <div class="input-group">
        <input type="number"
               class="form-control"
               name="noParcela"
               placeholder="Buscar Parcela por No. de Parcela..."
               value="{{ request('noParcela') }}"
               required>

        <button class="btn btn-ejidal">Buscar</button>
    </div>

    @if(session('parcela_error'))
        <div class="alert alert-danger mt-2">
            {{ session('parcela_error') }}
        </div>
    @endif
</form>


<!-- BUSCADOR DE EJIDATARIO -->
<div class="card card-ejidal mb-3">
<div class="card-header card-header-ejidal">Buscar Ejidatario por Número</div>
<div class="card-body">

<form method="GET">
    <div class="input-group">
        <input type="number"
               class="form-control"
               name="numeroEjidatario"
               placeholder="Número de Ejidatario"
               value="{{ request('numeroEjidatario') }}"
               required>
        <button class="btn btn-ejidal">Buscar</button>
    </div>
</form>

@if($ejidatario)
<div class="alert alert-success mt-2">
    Ejidatario encontrado:
    <strong>
        {{ $ejidatario->nombre }} {{ $ejidatario->apellidoPaterno }} {{ $ejidatario->apellidoMaterno }}
    </strong>
</div>
@endif

</div>
</div>

<!-- FORMULARIO NUEVA PARCELA -->
<form method="POST" action="{{ route('parcelas.store') }}">
@csrf

<input type="hidden" name="numeroEjidatario"
       value="{{ $ejidatario->numeroEjidatario ?? '' }}">

<!-- PARCELA -->
<div class="card card-ejidal mb-3">
<div class="card-header card-header-ejidal">Parcela</div>
<div class="card-body">

@if(!$ejidatario)
<div class="alert alert-warning">
    Debes buscar un ejidatario válido antes de guardar.
</div>
@endif

<div class="row mb-3">
<div class="col-md-5">
<label>No Parcela</label>
<input type="number" name="noParcela" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
<div class="col-md-7">
<label>Superficie</label>
<input type="text" name="superficie" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
</div>

<div class="row mb-3">
<div class="col-md-4">
<label>Uso de Suelo</label>
<select name="usoSuelo" class="form-select" {{ $ejidatario ? '' : 'disabled' }}>
@foreach($usos as $uso)
<option value="{{ $uso->idUso }}">{{ $uso->nombre }}</option>
@endforeach
</select>
</div>
<div class="col-md-8">
<label>Ubicación</label>
<input type="text" name="ubicacion" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
</div>

</div>
</div>

<!-- COLINDANCIAS -->
<div class="card card-ejidal mb-3">
<div class="card-header card-header-ejidal">Colindancias</div>
<div class="card-body">
<div class="row">
@foreach(['norte','sur','este','oeste','noreste','noroeste','sureste','suroeste'] as $c)
<div class="col-md-3 mb-2">
<label>{{ ucfirst($c) }}</label>
<input type="text" name="{{ $c }}" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
@endforeach
</div>
</div>
</div>

<!-- COORDENADAS -->
<div class="card card-ejidal mb-3">
<div class="card-header card-header-ejidal">Coordenadas</div>
<div class="card-body">

@foreach(range('A','G') as $i => $p)
<div class="row mb-2">
<div class="col-md-4">
<label>Punto</label>
<input type="text" name="punto[]" value="{{ $p }}" maxlength="1" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
<div class="col-md-4">
<label>Coordenada X</label>
<input type="number" step="0.0001" name="coordenadaX[]" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
<div class="col-md-4">
<label>Coordenada Y</label>
<input type="number" step="0.0001" name="coordenadaY[]" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
</div>
@endforeach

</div>
</div>

<!-- INFORMACIÓN ADMINISTRATIVA -->
<div class="card card-ejidal mb-3">
<div class="card-header card-header-ejidal">Información Administrativa</div>
<div class="card-body">

<div class="row mb-3">
<div class="col-md-5">
<label>Número de inscripción RAN</label>
<input type="text" name="num_inscripcionRAN" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
<div class="col-md-7">
<label>Clave núcleo agrario</label>
<input type="text" name="claveNucleoAgrario" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
</div>

<div class="row mb-3">
<div class="col-md-5">
<label>Comunidad</label>
<input type="text" name="comunidad" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
<div class="col-md-7">
<label>Fecha de expedición</label>
<input type="date" name="fechaExpedicion" class="form-control" {{ $ejidatario ? '' : 'disabled' }}>
</div>
</div>

</div>
</div>

<div class="text-end mt-4">
<button class="btn btn-ejidal" {{ $ejidatario ? '' : 'disabled' }}>Guardar Información</button>
</div>

</form>

</main>
</div>
</div>

@include('IncludeViews.pie')

</body>
</html>
