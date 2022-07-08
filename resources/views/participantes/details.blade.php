@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="col-md-12">
        @include('includes.message')
        <div class="card">
            <div class="card-header text-center">
                <h4>
                    {{ $participante->nombre." ".
                    $participante->apellido_paterno." ".
                    $participante->apelido_materno }}
                    <br>
                    <small class="text-muted">
                        {{ $participante->curp }}
                    </small>
                </h4>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Datos de contacto</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                <span class="fw-bold"><img src="{{ asset('img/phone.png') }}">&nbsp;&nbsp;Teléfono(s):</span>
                                <ul>
                                    @foreach ($telefonos as $telefono)
                                    <li>{{ $telefono->telefono }} ({{ $telefono->tipo }})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <span class="fw-bold"><img src="{{ asset('img/email.png') }}">&nbsp;&nbsp;Correo(s) electrónico(s):</span>
                                <ul>
                                    @foreach ($emails as $email)
                                    <li>{{ $email->email }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>Datos de preparación</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    No se encontraron datos de preparación del aspirante.
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Historial de participaciones</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col">Proceso</th>
                                    <th scope="col">Tipo de valoración</th>
                                    <th scope="col">Ciclo</th>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                </thead>
                                @foreach ($participaciones as $participacion)
                                    <tr>
                                        <th scope="row">{{ $participacion->nombre_proceso }}</th>
                                        <td>
                                            {{ $participacion->nombre_funcion.". ".$participacion->nombre_valoracion }}
                                            @isset($participacion->nombre_lengua)
                                                {{ ". ".$participacion->nombre_lengua }}
                                            @endisset
                                        </td>
                                        <td>{{ $participacion->ciclo }}</td>
                                        <td>{{ $participacion->posicion }}</td>
                                        <td>
                                            <a href="{{ route('participantes.detail-proceso', ['participacion_id' => $participacion->participacion_id]) }}"
                                            class="btn btn-success btn-sm"><img src="{{ asset('img/view.png') }}"
                                                alt="Ver resultatos completos" title="Ver resultatos completos"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFoure">
                            <strong>Historial de incidencias</strong>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFoure"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    No se encontraron incidencias reportadas del aspirante.
                                </div>
                            </div> 
                            <!--<table class="table table-striped">
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Proceso</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col"></th>
                                </thead>
                                <tr>
                                    <th scope="row">Formación docente pedagógica</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>-->
                            <a href="{{ route('participantes.incidencias', ['participante_id' => $participante->id, 'participacion_id' => 0]) }}"
                                class="btn btn-secondary"><img src="{{ asset('img/warning.png') }}"
                                    alt="Ver datos del participante" title="Ver datos del participante">&nbsp;&nbsp;Agregar incidencia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection