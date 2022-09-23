@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carga de listas de ordenamiento') }}</div>
                    <div class="card-body">
                        <h5>
                            {{ $proceso->nombre }}
                            <br>
                            <small class="text-muted">Ciclo escolar {{ $ciclo }}</small>
                            <hr>
                            <a href="/docs/layout_resultados_admision.xlsx" class="btn btn-success"><img src="/img/excel.png" alt="Excel-logo"> &nbsp; Descargar layout</a>
                            <br><br>
                            <form method="POST" action="#" enctype="multipart/form-data">
                                <div class="mb-3 col-auto">
                                    <input class="form-control" type="file" id="formFile" name="import_file">
                                </div>
                                <div class="col-auto d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-upload"></i> &nbsp; Cargar 
                                    </button>
                                    {{-- <button class="btn btn-primary" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Cargando...
                                    </button> --}}
                                </div>
                            </form>
                            <br>
                        </h5>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection