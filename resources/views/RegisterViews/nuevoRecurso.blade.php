<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
    @include('IncludeViews.cabeza')
</head>
<body>
    @include('IncludeViews.menu')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-ejidal">
                <i class="fas fa-plus-circle me-2"></i> Nuevo Recurso
            </h1>
        </div>

        <!-- ALERTAS -->
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- FORMULARIO -->
        <div class="card card-ejidal">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Registrar Recurso
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('recursos.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_recibo" class="form-label">Fecha de Recibo</label>
                            <input type="date" class="form-control" id="fecha_recibo" name="fecha_recibo" required>
                        </div>
                        <div class="col-md-6">
                            <label for="num_beneficiarios" class="form-label">Número de Beneficiarios</label>
                            <input type="number" class="form-control" id="num_beneficiarios" name="num_beneficiarios" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nombre_representante" class="form-label">Nombre del Representante</label>
                            <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" required>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('recursos.index') }}" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-1"></i> Guardar Recurso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('IncludeViews.pie')
</body>
</html>
