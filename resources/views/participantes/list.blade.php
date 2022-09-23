@extends('layouts.app')

@section('content')

<?php $num_participantes = count($participantes); ?>

<div class="container-xxl">
    <div class="col-md-12">
        @include('includes.message')
        <div class="card">
            <div class="card-header">
                <h2>{{ $proceso->nombre }}, ciclo escolar
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        id="select_ciclo">
                        <option value="2013-2014" @if ($ciclo == '2013-2014') {{ "selected" }} @endif>2013-2014</option>
                        <option value="2014-2015" @if ($ciclo == '2014-2015') {{ "selected" }} @endif>2014-2015</option>
                        <option value="2015-2016" @if ($ciclo == '2015-2016') {{ "selected" }} @endif>2015-2016</option>
                        <option value="2016-2017" @if ($ciclo == '2016-2017') {{ "selected" }} @endif>2016-2017</option>
                        <option value="2017-2018" @if ($ciclo == '2017-2018') {{ "selected" }} @endif>2017-2018</option>
                        <option value="2018-2019" @if ($ciclo == '2018-2019') {{ "selected" }} @endif>2018-2019</option>
                        <option value="2019-2020" @if ($ciclo == '2019-2020') {{ "selected" }} @endif>2019-2020</option>
                        <option value="2020-2021" @if ($ciclo == '2020-2021') {{ "selected" }} @endif>2020-2021</option>
                        <option value="2021-2022" @if ($ciclo == '2021-2022') {{ "selected" }} @endif>2021-2022</option>
                        <option value="2022-2023" @if ($ciclo == '2022-2023') {{ "selected" }} @endif>2022-2023</option>
                    </select>
                </h2>
                <form name="valoracion_id" id="form_valoracion_id" method="GET" action="#">
                    @csrf
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        id="select_valoracion_id">
                        <option value="0" @if ($valoracion_id==0) {{ "selected" }} @endif>- Selecciona el tipo de
                            valoración -
                        </option>
                        @foreach ($valoraciones as $valoracion)
                        <option value="{{ $valoracion->id }}" @if ($valoracion_id==$valoracion->id) {{ "selected" }}
                            @endif>
                            {{ $valoracion->funcion->nombre.". ".$valoracion->nombre }}
                            @isset($valoracion->lengua->nombre)
                            {{ ". ".$valoracion->lengua->nombre }}
                            @endisset
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{ $proceso_id }}" name="proceso_id" id="select_proceso_id">
                </form>
            </div>

            <table class="table table-striped table-hover">
                @if (isset($participantes) && $num_participantes > 0)
                <thead>
                    <tr>
                        <th scope="col">CURP</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">#</th>
                        <th scope="col">Puntaje global</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @endif

                <tbody>
                    @foreach ($participantes as $participante)
                    <tr>
                        <th scope="row">{{ $participante->curp }}</th>
                        <td>{{ $participante->nombre." ".$participante->apellido_paterno."
                            ".$participante->apellido_materno }}</td>
                        <td>{{ $participante->posicion }}</td>
                        <td>{{ $participante->p_global."No disponible" }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="{{ route('participantes.detail-proceso', ['participacion_id' => $participante->participacion_id]) }}"
                                    class="btn btn-success btn-sm"><i class="bi bi-eye-fill" title="Ver detalle"></i>
                                </a>
                                <a href="{{ route('participantes.details', ['participante_id' => $participante->participante_id]) }}"
                                    class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-person-fill" title="Ver datos completos del participante"></i>
                                </a>
                                <a href="{{ route('participantes.incidencias', ['participante_id' => $participante->participante_id, 'participacion_id' => $participante->participacion_id]) }}"
                                    class="btn btn-secondary btn-sm"><i class="bi bi-exclamation-circle-fill" title="Incidencias"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            {{ $participantes->links() }}
        </div>
    </div>
</div>
@endsection