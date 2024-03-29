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
                                <span class="fw-bold"><i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;Teléfono(s):</span>
                                <ul>
                                    @foreach ($telefonos as $telefono)
                                    <li>{{ $telefono->telefono }} ({{ $telefono->tipo }})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <span class="fw-bold"><i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;Correo(s) electrónico(s):</span>
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
                                <div>
                                    <i class="bi bi-exclamation-triangle-fill"></i>&nbsp;
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
                                            class="btn btn-success btn-sm"><i class="bi bi-eye-fill" title="Ver detalle"></i></a>
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
                                {{-- Si existen incidencias las despliega --}}
                                @if (count($incidencias) > 0)
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th scope="col">Proceso</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Detalle</th>
                                    </thead>
                                    @foreach ($incidencias as $incidencia)
                                    <tr>
                                        <th scope="row">{{ $incidencia->id }}</th>
                                        <td>{{ $incidencia->nombre_proceso.". ".$incidencia->ciclo }}</td>
                                        <td>{{ $incidencia->descripcion }}</td>
                                        <td>
                                            @if ($incidencia->desc_estatus == "En proceso")
                                                <?php $label = "success"; ?>
                                            @endif
                                            @if ($incidencia->desc_estatus == "Cerrado")
                                                <?php $label = "danger"; ?>
                                            @endif
                                            <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-{{ $label }} bg-{{ $label }} bg-opacity-10 border border-{{ $label }} border-opacity-10 rounded-2">{{ $incidencia->desc_estatus }}</small>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye-fill" title="Ver detalle"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                {{-- Si no existen incidencias despliega mensaje --}}
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <div>
                                        <i class="bi bi-exclamation-triangle-fill"></i>&nbsp;
                                        No se encontraron incidencias reportadas del aspirante.
                                    </div>
                                </div> 
                                @endif
                            <a href="{{ route('participantes.incidencias', ['participante_id' => $participante->id, 'participacion_id' => 0]) }}"
                                class="btn btn-secondary"><i class="bi bi-exclamation-circle-fill" title="Incidencias"></i>&nbsp;&nbsp;Agregar incidencia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection