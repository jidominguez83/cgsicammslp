@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="col-md-12">

        {{-- Incluye archivo de mensajes del sistema --}}
        @include('includes.message')

        <div class="card">
            {{-- Verifica el proceso del participante para buscar en la carpeta correspondiente --}}
            @switch($participacion->proceso_id)
                @case(1)
                    <?php $folderProceso = 'admision' ?>
                    @break
                @case(2)
                    <?php $folderProceso = 'vertical' ?>
                    @break
                @case(3)
                    <?php $folderProceso = 'horizontal' ?>
                    @break
                @case(4)
                    <?php $folderProceso = 'horas_adicionales' ?>
                    @break
                @default
                    
            @endswitch

            {{-- Incluye el archivo que contiene los resultados dependiendo de los parámetros solicitados --}}
            @include('includes.resultados.'.$folderProceso.'.'.$participacion->ciclo)

            <div class="card-footer text-muted text-center">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="{{ route('participantes.details', ['participante_id' => $participacion->participante_id]) }}"
                    class="btn btn-primary"><i class="bi bi-file-earmark-person-fill" title="Ver datos completos del participante"></i>&nbsp;&nbsp;Datos del participante</a>
                <a href="{{ route('participantes.incidencias', ['participante_id' => $participacion->participante_id, 'participacion_id' => $participacion->id]) }}"
                    class="btn btn-secondary"><i class="bi bi-exclamation-circle-fill" title="Incidencias"></i>&nbsp;&nbsp;Agregar incidencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection