<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan - Editar Parcela</title>

    <!-- Bootstrap -->
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
                <h1 class="h2 text-ejidal">Editar Parcela</h1>
                <a href="{{ route('parcelas.create') }}" class="btn btn-ejidal">Nueva Parcela</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- BUSCADOR -->
            <form method="GET" action="{{ route('parcelas.ver') }}" class="mb-3">
                <div class="input-group">
                    <input type="text"
                           name="noParcela"
                           class="form-control form-control-ejidal"
                           placeholder="Buscar Parcela por No. de Parcela..."
                           value="{{ request('noParcela') }}">
                    <button class="btn btn-ejidal" type="submit">Buscar</button>
                </div>
            </form>

            <!-- FORMULARIO EDITAR -->
            <form method="POST" action="{{ route('parcelas.actualizar') }}">
                @csrf

                <input type="hidden" name="idParcela" value="{{ $parcela->idParcela }}">
                <input type="hidden" name="numeroEjidatario" value="{{ $ejidatario->numeroEjidatario }}">

                <!-- PARCELA -->
                <div class="card card-ejidal mb-3">
                    <div class="card-header card-header-ejidal">Parcela</div>
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label class="label-ejidal">No Parcela</label>
                                <input type="number" name="noParcela"
                                       class="form-control form-control-ejidal"
                                       value="{{ $parcela->noParcela }}">
                            </div>

                            <div class="col-md-7">
                                <label class="label-ejidal">Superficie</label>
                                <input type="text" name="superficie"
                                       class="form-control form-control-ejidal"
                                       value="{{ $parcela->superficie }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="label-ejidal">Uso de Suelo</label>
                                <select name="usoSuelo"
                                        class="form-select form-select-ejidal">
                                    @foreach($usos as $uso)
                                        <option value="{{ $uso->idUso }}"
                                            {{ $parcela->idUso == $uso->idUso ? 'selected' : '' }}>
                                            {{ $uso->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label class="label-ejidal">Ubicación</label>
                                <input type="text" name="ubicacion"
                                       class="form-control form-control-ejidal"
                                       value="{{ $parcela->ubicacion }}">
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
                                    <label class="label-ejidal">{{ ucfirst($c) }}</label>
                                    <input type="text" name="{{ $c }}"
                                           class="form-control form-control-ejidal"
                                           value="{{ $colindancia[$c] ?? '' }}">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- COORDENADAS -->
                <div class="card card-ejidal mb-3">
                    <div class="card-header card-header-ejidal">Coordenadas</div>
                    <div class="card-body">

                        @foreach($coordenadas as $coor)
                            <div class="row mb-2">

                                <div class="col-md-4">
                                    <label class="label-ejidal">Punto</label>
                                    <input type="text"
                                           name="coordenadas[{{ $loop->index }}][punto]"
                                           class="form-control form-control-ejidal"
                                           value="{{ $coor->punto }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="label-ejidal">Coordenada X</label>
                                    <input type="number" step="0.0001"
                                           name="coordenadas[{{ $loop->index }}][coordenadaX]"
                                           class="form-control form-control-ejidal"
                                           value="{{ $coor->coordenadaX }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="label-ejidal">Coordenada Y</label>
                                    <input type="number" step="0.0001"
                                           name="coordenadas[{{ $loop->index }}][coordenadaY]"
                                           class="form-control form-control-ejidal"
                                           value="{{ $coor->coordenadaY }}">
                                    <input type="hidden"
                                           name="coordenadas[{{ $loop->index }}][idCoordenada]"
                                           value="{{ $coor->idCoordenada }}">
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
                                <label class="label-ejidal">Número de inscripción RAN</label>
                                <input type="text" name="num_inscripcionRAN"
                                       class="form-control form-control-ejidal"
                                       value="{{ $infAdmin->num_inscripcionRAN ?? '' }}">
                            </div>

                            <div class="col-md-7">
                                <label class="label-ejidal">Clave núcleo agrario</label>
                                <input type="text" name="claveNucleoAgrario"
                                       class="form-control form-control-ejidal"
                                       value="{{ $infAdmin->claveNucleoAgrario ?? '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label class="label-ejidal">Comunidad</label>
                                <input type="text" name="comunidad"
                                       class="form-control form-control-ejidal"
                                       value="{{ $infAdmin->comunidad ?? '' }}">
                            </div>

                            <div class="col-md-7">
                                <label class="label-ejidal">Fecha de expedición</label>
                                <input type="date" name="fechaExpedicion"
                                       class="form-control form-control-ejidal"
                                       value="{{ $infAdmin->fechaExpedicion ?? '' }}">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- BOTÓN -->
                <div class="text-end mt-4">
                    <button class="btn btn-ejidal">Actualizar Información</button>
                </div>

            </form>

        </main>
    </div>
</div>

@include('IncludeViews.pie')

</body>
</html>
