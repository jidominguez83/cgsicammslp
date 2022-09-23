@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Incidencias
                    </h4>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Agregar incidencia</strong>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form method="POST" action="{{ route('incidencias.save') }}">
                                    @csrf
                                    <h4>
                                        {{ $participante->nombre." ".
                                        $participante->apellido_paterno." ".
                                        $participante->apellido_materno }}
                                        <br>
                                        <small class="text-muted">{{ $participante->curp }}</small>
                                    </h4>

                                    <input type="hidden" name="participante" value="{{ $participante->id }}">

                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="participacion_proceso">
                                            <option value="0" @if ($participacion_id == '0') {{ "selected" }} @endif>- Seleccione un proceso -</option>
                                            @foreach ($participaciones as $participacion)
                                                <option value="{{ $participacion->participacion_id }}" @if ($participacion_id == $participacion->participacion_id) {{ "selected" }} @endif>
                                                    {{ $participacion->nombre_proceso.", ".$participacion->ciclo.". ".$participacion->nombre_funcion.". ".$participacion->nombre_valoracion }}
                                                    @isset($participacion->nombre_lengua)
                                                    {{ ". ".$participacion->nombre_lengua }}
                                                    @endisset
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Proceso:</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descripcion"></textarea>
                                        <label for="floatingTextarea2">Descripción de la incidencia</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Trae documento</label>
                                    </div>
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                    <br>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Subir documento en formato PDF</label>
                                        <input class="form-control" type="file" id="formFile" name="documento">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault" name="requiere_respuesta">Requiere respuesta</label>
                                    </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success">Guardar incidencia</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>Historial de incidencias</strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
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
                                            <a href="#" class="btn btn-success btn-sm"><img src="{{ asset('img/view.png') }}"  alt="Ver detalle de la incidencia" title="Ver detalle de la incidencia"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                {{-- Si no existen incidencias despliega mensaje --}}
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="warning:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        No se encontraron incidencias reportadas del aspirante.
                                    </div>
                                </div> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection