<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejido San Rafael Ixtapalucan</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estiloPrincipal.css') }}">
</head>
<body>
    

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar bg-dark sidebar collapse" id="sidebarMenu">
            <div class="position-sticky pt-3">
                    <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link active" href="{{ route('principal') }}">
              <i class="fas fa-home"></i> Inicio
            </a>
          </li>

          <!-- Usuarios -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#usuariosMenu">
              <i class="fas fa-users"></i> Usuarios
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="usuariosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-address-card"></i> Nuevo Usuario</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i> Buscar Usuario</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Listado Completo</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-file-export"></i> Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i> Documentos Usuario</a></li>
              </ul>
            </div>
          </li>

          <!-- Ejidatarios -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ejidatariosMenu">
              <i class="fas fa-users"></i> Ejidatarios
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="ejidatariosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="{{ url('/nuevoE') }}"><i class="far fa-address-card"></i> Nuevo Ejidatario</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i> Buscar Ejidatario</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/listadoEjidatarios') }}"><i class="fas fa-list"></i> Listado Completo</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-file-export"></i> Reportes</a></li>
              </ul>
            </div>
          </li>

          <!-- Faenas -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#faenasMenu">
              <i class="fas fa-clipboard-check"></i> Faenas
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="faenasMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nueva Faena</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Calendario</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Listado</a></li>
              </ul>
            </div>
          </li>

          <!-- Asambleas -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#asambleasMenu">
              <i class="fas fa-clipboard-check"></i> Asambleas
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="asambleasMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nueva Asamblea</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Calendario</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Acta de Asambleas</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Listado</a></li>
              </ul>
            </div>
          </li>

          <!-- Asistencia -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#asistenciaMenu">
              <i class="fas fa-list-check"></i> Pase de Lista
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="asistenciaMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nuevo Pase</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-history"></i> Historial</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Estadísticas</a></li>
              </ul>
            </div>
          </li>

          <!-- Descuentos -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#descuentosMenu">
              <i class="fas fa-money-bill-wave"></i> Descuentos
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="descuentosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nuevo Descuento</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Registros</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-file-invoice-dollar"></i> Reportes</a></li>
              </ul>
            </div>
          </li>

          <!-- Utilidades -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#utilidadesMenu">
              <i class="fas fa-hand-holding-usd"></i> Reparto Utilidades
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="utilidadesMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-calculator"></i> Calcular</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-money-bill-trend-up"></i> Distribuir</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-history"></i> Historial</a></li>
              </ul>
            </div>
          </li>

          <!-- Préstamos -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#prestamosMenu">
              <i class="fas fa-hand-holding-heart"></i> Préstamos
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="prestamosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nuevo Préstamo</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Activos</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-history"></i> Historial</a></li>
              </ul>
            </div>
          </li>

          <!-- Parcelas -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#parcelasMenu">
              <i class="fas fa-map-marked-alt"></i> Parcelas
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="parcelasMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="{{ route('parcelas.create') }}"><i class="fas fa-plus-circle"></i> Nueva Parcela</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-map"></i> Mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('parcelas.index') }}"><i class="fas fa-list"></i> Listado</a></li>
              </ul>
            </div>
          </li>

          <!-- Gastos -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gastosMenu">
              <i class="fas fa-wallet"></i> Gastos
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="gastosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="{{ route('gastos.create') }}"><i class="fas fa-plus-circle"></i> Nuevo Gasto</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('gastos.index') }}"><i class="fas fa-list"></i> Consultar Gastos</a></li>
              </ul>
            </div>
          </li>

          <!-- Inventario -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#inventarioMenu">
              <i class="fas fa-warehouse"></i> Inventario
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="inventarioMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="{{ route('articulos.create') }}"><i class="fas fa-plus-circle"></i> Nuevo Artículo</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articulos.index') }}"><i class="fas fa-list"></i> Listado</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articulos.reporte') }}"><i class="fas fa-exchange-alt"></i> Movimientos</a></li>
              </ul>
            </div>
          </li>

          <!-- Entradas y Salidas -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#entradasSalidasMenu">
              <i class="fas fa-exchange-alt"></i> Entradas y Salidas
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="entradasSalidasMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="{{ route('entradas.create') }}"><i class="fas fa-plus-circle"></i> Entradas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('salidas.create') }}"><i class="fas fa-minus-circle"></i> Salidas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reporte.eys') }}"><i class="fas fa-chart-pie"></i> Reportes</a></li>
              </ul>
            </div>
          </li>

          <!-- Apoyos -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#apoyosMenu">
              <i class="fas fa-hands-helping"></i> Apoyos Sociales
              <i class="fas fa-angle-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="apoyosMenu">
              <ul class="nav flex-column submenu">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Nuevo Apoyo</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-list"></i> Registros</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-pie"></i> Reportes</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-chart-bar"></i> Reportes
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-cogs"></i> Configuración
            </a>
          </li>

        </ul>
                </div>
            </div>

 



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    

</body>
</html>
