<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Movimientos de Artículos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloPrincipal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @media print {
            button { display: none; }
            body::after {
                content: "Sistema de Gestión Ejidal © 2025 | Versión 1.0.0";
                display: block;
                text-align: center;
                margin-top: 20px;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

<div class="container-fluid">

    <!-- ENTRADAS -->
    <div class="row mb-5">
        <div class="col-md-10 p-4">

            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                <h1 class="h2 text-ejidal">Entradas de Artículos</h1>
                <button class="btn btn-success" onclick="printTable('tablaEntradas')">
                    <i class="fas fa-file-pdf"></i> Generar PDF
                </button>
            </div>

            <table id="tablaEntradas" class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($entradas as $e)
                        <tr>
                            <td>{{ $e->articulo->descripcion }}</td>
                            <td>{{ $e->cantidad }}</td>
                            <td>{{ $e->fecha_entrada }}</td>
                            <td>{{ $e->observaciones }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                No hay entradas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

    <!-- SALIDAS -->
    <div class="row">
        <div class="col-md-10 p-4">

            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                <h1 class="h2 text-ejidal">Salidas de Artículos</h1>
                <button class="btn btn-danger" onclick="printTable('tablaSalidas')">
                    <i class="fas fa-file-pdf"></i> Generar PDF
                </button>
            </div>

            <table id="tablaSalidas" class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Responsable</th>
                        <th>Observaciones</th>
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
                            <td>{{ $s->observaciones }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No hay salidas registradas
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

<script>
function printTable(tableId) {
    const original = document.body.innerHTML
    const table = document.getElementById(tableId).outerHTML
    document.body.innerHTML =
        '<h2 style="text-align:center">Movimientos de Artículos</h2>' +
        table
    window.print()
    document.body.innerHTML = original
    location.reload()
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
