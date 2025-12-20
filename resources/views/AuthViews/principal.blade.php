<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejido San Rafael Ixtapalucan</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/estiloPrincipal.css') }}">
  @include('IncludeViews.cabeza')

</head>
<body>
@include('IncludeViews.menu')


            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Sección hero (puede ser el dashboard) -->
                <div class="hero-section rounded-3 text-center mb-4">
                    <h1 class="display-4 fw-bold">Bienvenido al Sistema de Gestión Ejidal</h1>
                    <p class="lead">Herramienta integral para la administración de tu ejido</p>
                </div>
                
                <!-- Tarjetas resumen -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card card-ejidal h-100">
                            <div class="card-header card-header-ejidal">
                                <i class="fas fa-users me-2"></i> Ejidatarios
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">150 Registrados</h5>
                                <p class="card-text">Gestiona la información de los ejidatarios y sus familias.</p>
                                <a href="#" class="btn btn-sm btn-ejidal">Administrar</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="card card-ejidal h-100">
                            <div class="card-header card-header-ejidal">
                                <i class="fas fa-clipboard-check me-2"></i> Faenas
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">12 Pendientes</h5>
                                <p class="card-text">Organiza las faenas comunitarias y lleva control de asistencias.</p>
                                <a href="#" class="btn btn-sm btn-ejidal">Ver faenas</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="card card-ejidal h-100">
                            <div class="card-header card-header-ejidal">
                                <i class="fas fa-map-marked-alt me-2"></i> Parcelas
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">85 Registradas</h5>
                                <p class="card-text">Administra la información de parcelas y sus colindancias.</p>
                                <a href="#" class="btn btn-sm btn-ejidal">Ver parcelas</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de actividades recientes -->
                <div class="card card-ejidal mb-4">
                    <div class="card-header card-header-ejidal">
                        <i class="fas fa-history me-2"></i> Actividad Reciente
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                        <th>Usuario</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>05/04/2023</td>
                                        <td>Nueva faena registrada</td>
                                        <td>Admin</td>
                                        <td>Limpieza de canales</td>
                                    </tr>
                                    <tr>
                                        <td>04/04/2023</td>
                                        <td>Pago registrado</td>
                                        <td>Secretaría</td>
                                        <td>Pago de utilidades a Juan Pérez</td>
                                    </tr>
                                    <tr>
                                        <td>03/04/2023</td>
                                        <td>Asistencia registrada</td>
                                        <td>Consejo</td>
                                        <td>Pase de lista faena #45</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Otras secciones del dashboard -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card card-ejidal h-100">
                            <div class="card-header card-header-ejidal">
                                <i class="fas fa-calendar-alt me-2"></i> Próximos Eventos
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Reunión de ejidatarios
                                        <span class="badge bg-primary rounded-pill">10/04/2023</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Faena: Limpieza de caminos
                                        <span class="badge bg-primary rounded-pill">12/04/2023</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Vencimiento de pagos
                                        <span class="badge bg-primary rounded-pill">15/04/2023</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card card-ejidal h-100">
                            <div class="card-header card-header-ejidal">
                                <i class="fas fa-chart-pie me-2"></i> Estadísticas
                            </div>
                            <div class="card-body text-center">
                                <img src="https://imgs.search.brave.com/_OD2DCBAAx4-V7af3ZdEvtxq2esmTdk2hzd1NOKmkxQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jeGNz/Lm1pY3Jvc29mdC5u/ZXQvc3RhdGljL3B1/YmxpYy9vZmZpY2Uv/ZXMtZXMvYjhiNDY5/MDEtNTEzYi00MDY4/LWJkYWEtMjU2ZWE5/YjEzZTk3L2RhM2Zi/OWY0YjZjNjgwZDhh/NmJhYmE4YjBiMzRl/YTQ0MDNkNWQ1Nzku/anBn" alt="Gráficas de estadísticas" class="img-fluid mb-3">
                                <p>Resumen de actividades, asistencias y pagos del mes.</p>
                                <a href="#" class="btn btn-sm btn-ejidal">Ver reportes completos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @include('IncludeViews.pie')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>
