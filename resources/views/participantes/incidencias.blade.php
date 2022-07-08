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
                                <form method="POST" action="#">
                                    @csrf
                                    <h4>
                                        {{ $participante->nombre." ".
                                        $participante->apellido_paterno." ".
                                        $participante->apellido_materno }}
                                        <br>
                                        <small class="text-muted">{{ $participante->curp }}</small>
                                    </h4>

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
                                        <label for="formFile" class="form-label"><img src="{{ asset('img/pdf-gray.png') }}">&nbsp;Subir documento en formato PDF</label>
                                        <input class="form-control" type="file" id="formFile" name="documento">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault" name="requiere_respuesta">Requiere respuesta</label>
                                    </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-success">Guardar incidencia</button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection