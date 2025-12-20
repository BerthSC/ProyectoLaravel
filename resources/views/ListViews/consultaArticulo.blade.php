<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Artículos - Ejido San Rafael Ixtapalucan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Estilos propios -->
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
                    <h1 class="h2 text-ejidal">Listado de Artículos</h1>

                    <a href="{{ route('articulos.create') }}" class="btn btn-ejidal">
                        Nuevo Artículo
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

               <div class="mb-2">
    <h5 class="text-ejidal">
        Buscar artículo por descripción, estado o fecha
    </h5>
</div>

<form method="GET" action="{{ route('articulos.buscar') }}" class="crud-actions mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="text"
                   name="descripcion"
                   class="form-control"
                   placeholder="Descripción"
                   value="{{ request('descripcion') }}">
        </div>

        <div class="col-md-4">
            <input type="text"
                   name="estado"
                   class="form-control"
                   placeholder="Estado"
                   value="{{ request('estado') }}">
        </div>

        <div class="col-md-3">
            <input type="date"
                   name="fecha_registro"
                   class="form-control"
                   value="{{ request('fecha_registro') }}">
        </div>

        <div class="col-md-1">
            <button class="btn btn-ejidal w-100">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>



                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Medida</th>
                            <th>Fecha registro</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($articulos as $a)
                            <tr>
                                <td>{{ $a->descripcion }}</td>
                                <td>{{ $a->cantidad }}</td>
                                <td>{{ $a->estado }}</td>
                                <td>{{ $a->medida }}</td>
                                <td>{{ $a->fecha_registro }}</td>
                                <td class="text-center">

                                    <a href="{{ route('articulos.edit', $a->id_equipo) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('articulos.destroy', $a->id_equipo) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Eliminar este artículo?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No hay artículos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</main>

@include('IncludeViews.pie')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
