<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Parcelas - Ejido San Rafael Ixtapalucan</title>

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
    <h1 class="h2 text-ejidal">Listado</h1>

    <a href="{{ route('parcelas.create') }}" class="btn btn-ejidal">
        Nueva Parcela
    </a>
</div>

                <table class="table table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>No. Parcela</th>
            <th>Ubicación</th>
            <th>Ejidatario</th>
        </tr>
    </thead>

    <tbody>
        @forelse($parcelas as $p)
            <tr>
                <td>{{ $p->noParcela }}</td>
                <td>{{ $p->ubicacion }}</td>
                <td>{{ $p->ejidatario ?? 'Sin asignar' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    No hay datos registrados.
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

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
