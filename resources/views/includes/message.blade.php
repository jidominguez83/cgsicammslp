@if (isset($valoracion_id) && $valoracion_id != 0)
    @if ($num_participantes == 0)
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <div>
            <i class="bi bi-exclamation-triangle-fill"></i>&nbsp;
            {{ session('no-encontrado') }}
        </div>
    </div>
    @endif
@endif


    {{ session('success') }}
