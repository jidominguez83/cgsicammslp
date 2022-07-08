@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="col-md-12">
        @include('includes.message')
        <div class="card">
            <div class="card-header text-center">
                <h4>
                    {{ $participacion->nombre." ".
                    $participacion->apellido_paterno." ".
                    $participacion->apellido_materno }}
                    <br>
                    <small class="text-muted">
                        {{ $participacion->curp }}
                    </small>
                </h4>
                <p class="fw-bolder fs-5">
                    {{ "Ciclo escolar ".$participacion->ciclo }}<br>
                    {{ $participacion->nombre_proceso.". ".$participacion->nombre_funcion.".
                    ".$participacion->nombre_valoracion }}
                    @isset($participacion->nombre_lengua)
                    {{ ". ".$participacion->nombre_lengua }}
                    @endisset
                </p>
            </div>
            <div class="card-body">
                <h5>Posición: <span class="badge bg-secondary">0</span></h5>
                <h5>Puntaje global: <span class="badge bg-secondary">No disponible</span></h5>
                <h5>Folio federal: <span class="badge bg-secondary">{{ $participacion->folio_federal }}</span></h5>

                <table class="table table-striped">
                    <thead>
                        <th scope="col">Elemento multifactorial</th>
                        <th scope="col">Puntaje obtenido</th>
                        <th scope="col">Nivel de dominio obtenido</th>
                    </thead>
                    <tr>
                        <th scope="row">Formación docente pedagógica</th>
                        <td>

                        </td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">Promedio general de la carrera</th>
                        <td>

                        </td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">Cursos extracurriculares</th>
                        <td>

                        </td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">Experiencia docente</th>
                        <td>

                        </td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">Apreciación de conocimientos y aptitudes</th>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </table>

                <h5 class="card-title">Incidencias durante el proceso</h5>
                
                
                    @foreach ($incidencias as $incidencia)
                    {{ $incidencias->descripcion }}
                    @endforeach
                
                    <p class="card-text">Sin indidencias reportadas hasta el momento.</p>
                

            </div>
            <div class="card-footer text-muted text-center">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="{{ route('participantes.details', ['participante_id' => $participacion->participante_id]) }}"
                    class="btn btn-primary"><img src="{{ asset('img/participante.png') }}"
                        alt="Ver datos del participante" title="Ver datos del participante">&nbsp;&nbsp;Datos del participante</a>
                <a href="{{ route('participantes.incidencias', ['participante_id' => $participacion->participante_id, 'participacion_id' => $participacion->id]) }}"
                    class="btn btn-secondary"><img src="{{ asset('img/warning.png') }}"
                        alt="Ver datos del participante" title="Ver datos del participante">&nbsp;&nbsp;Agregar incidencia</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection