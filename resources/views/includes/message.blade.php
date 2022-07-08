@if (isset($valoracion_id) && $valoracion_id != 0)
    @if ($num_participantes == 0)
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="warning:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            {{ session('no-encontrado') }}
        </div>
    </div>
    @endif
@endif