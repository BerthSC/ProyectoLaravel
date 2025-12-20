<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Salidas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloPrincipal.css') }}">
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="container-fluid">
<div class="row">
<div class="col-md-10 p-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-ejidal">Listado de Salidas</h1>
    <a href="{{ route('salidas.create') }}" class="btn btn-ejidal">Nueva Salida</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered align-middle">
<thead class="table-dark">
<tr>
    <th>Artículo</th>
    <th>Cantidad</th>
    <th>Tipo</th>
    <th>Fecha</th>
    <th>Responsable</th>
    <th class="text-center">Acciones</th>
</tr>
</thead>

<tbody>
@forelse($salidas as $s)
<tr>
    <td>{{ $s->articulo->descripcion }}</td>
    <td>{{ $s->cantidad }}</td>
    <td>{{ $s->tipo_salida }}</td>
    <td>{{ $s->fecha_salida }}</td>
    <td>{{ $s->responsable }}</td>
    <td class="text-center">

        <a href="{{ route('salidas.edit', $s->id_salida) }}"
           class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('salidas.destroy', $s->id_salida) }}"
              method="POST"
              style="display:inline"
              onsubmit="return confirm('¿Eliminar esta salida?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
            </button>
        </form>

    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">No hay salidas registradas</td>
</tr>
@endforelse
</tbody>
</table>

</div>
</div>
</div>

</main>

@include('IncludeViews.pie')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
