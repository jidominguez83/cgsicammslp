<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="favicon/x-icon" href="{{ asset('img/gobslp_icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEGE | Coordinación General del SICAMM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('img/gobslp.png') }}" width="135px">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        </li>
                        @endif

                        @else

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('participantes.list', ['proceso_id' => 1, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Admisión</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false" href="#">Reconocimiento</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 5, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Tutoría</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 6, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">AT/ATP</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 7, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Beca
                                        Comisión</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Notificaciones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false" href="#">Promoción</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 2, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Vertical</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 3, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Horizontal</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('participantes.list', ['proceso_id' => 4, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Horas
                                        Adicionales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('participantes.list', ['proceso_id' => 8, 'ciclo' => '2022-2023' ,'valoracion_id' => 0]) }}">Cambios
                                de C.T.</a>
                        </li>

                        <button type="button" class="btn" style="background-color: #e3f2fd;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo"><img
                                src="{{ asset('img/search-16.png') }}" alt="Buscar aspirante"
                                title="Buscar un aspirante">&nbsp;Buscar</button>

                        <div class="vr d-none d-lg-flex h-120 mx-lg-2 text-black"></div>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('img/logout.png') }}" alt="Cerrar sesión">&nbsp;
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Buscar un aspirante</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="inputGroup-sizing-lg">
                                    <img src="{{ asset('img/search-24.png') }}">
                                </span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-lg" placeholder="Teclea la CURP" maxlength="18" id="search_participante">
                            </div>
                        </form>
                    </div>
                        <div class="card w-100">
                            <ul class="list-group list-group-flush" id="ul_result_participantes">

                            </ul>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>