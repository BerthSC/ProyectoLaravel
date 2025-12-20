<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Gastos - Ejido San Rafael Ixtapalucan</title>

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
                    <h1 class="h2 text-ejidal">Listado de Gastos</h1>

                    <a href="{{ route('gastos.create') }}" class="btn btn-ejidal">
                        Nuevo Gasto
                    </a>
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


                <div class="mb-2">
    <h5 class="text-ejidal">
        Buscar gasto por responsable, concepto o fecha exacta
    </h5>
</div>


                <form method="GET" action="{{ route('gastos.index') }}" class="crud-actions mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="text"
                   name="responsable"
                   class="form-control"
                   placeholder="Responsable"
                   value="{{ request('responsable') }}">
        </div>

        <div class="col-md-4">
            <input type="text"
                   name="concepto"
                   class="form-control"
                   placeholder="Concepto"
                   value="{{ request('concepto') }}">
        </div>

        <div class="col-md-3">
            <input type="date"
                   name="fecha"
                   class="form-control"
                   value="{{ request('fecha') }}">
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
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Concepto</th>
                            <th>Medida</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($gastos as $g)
                            <tr>
                                <td>{{ $g->responsable }}</td>
                                <td>{{ $g->fecha }}</td>
                                <td>${{ number_format($g->monto, 2) }}</td>
                                <td>{{ $g->concepto }}</td>
                                <td>{{ $g->medida }}</td>
                                <td class="text-center">

                                    <a href="{{ route('gastos.edit', $g->idGasto) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('gastos.destroy', $g->idGasto) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Eliminar este gasto?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No hay gastos registrados.
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
