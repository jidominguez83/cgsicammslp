@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido(a)') }}</div>

                <div class="card-body">
                    @php $user = \Auth::user(); @endphp
                    <h5>
                        {{ $user->name }}
                        <br>
                        <small class="text-muted">{{ $user->email }}</small>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection