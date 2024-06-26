<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if (\Illuminate\Support\Facades\Auth::user())

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Example single danger button -->
    <div class="btn-group dropstart">

    </div>

    <!-- Modo Daltónico Protanopia -->
    @php
    $user = \Illuminate\Support\Facades\Auth::user();
    $styles = [
    ['file' => 'daltonico.css', 'condition' => $user->p1 == 1],
    ['file' => 'daltonico2.css', 'condition' => $user->p2 == 1],
    ['file' => 'daltonico3.css', 'condition' => $user->p3 == 1],
    ];
    @endphp

    @foreach ($styles as $style)
    @if ($style['condition'])
    <link href="{{ asset('assets/css/' . $style['file']) }}" rel="stylesheet" type="text/css" />
    @endif
    @endforeach


    <!-- Fin -->
    <div class="btn-group dropleft">

        <button type="button" class="btn btn-warning" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Accesibilidad">
            <i class="bi bi-universal-access" style="font-size: 15px;"></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accesibilidadDropdown">
            <li class="dropdown-header">ACCESIBILIDAD</li>

            <li>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('usuarios.personalizar', 0) }}" onclick="toggleDaltonico()">
                    Normal
                    @if (auth()->user()->p1 == 0 && auth()->user()->p2 == 0 && auth()->user()->p3 == 0)
                    <i id="icon-daltonico" class="bi bi-eye-fill"></i>
                    @endif
                </a>
            </li>
            <li>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('usuarios.personalizar', 1) }}" onclick="toggleDaltonico()">
                    Protanopia
                    @if (auth()->user()->p1 == 1)
                    <i id="icon-daltonico" class="bi bi-eye-fill"></i>
                    @endif
                </a>
            </li>
            <li>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('usuarios.personalizar', 2) }}" onclick="mejorarNitidez()">
                    Deuteranopia
                    @if (auth()->user()->p2 == 1)
                    <i id="icon-nitidez" class="bi bi-eye-fill"></i>
                    @endif
                </a>
            </li>
            <li>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('usuarios.personalizar', 3) }}" onclick="mejorarEnfoque()">
                    Tritanopia
                    @if (auth()->user()->p3 == 1)
                    <i id="icon-enfoque" class="bi bi-eye-fill"></i>
                    @endif
                </a>
            </li>
        </ul>


    </div>





    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            {{-- @if (isset($customData->imagen))
                    <img src="{{ asset($customData->imagen) }}" alt="Imagen" class="" width="100px"
            style="width: 40px;margin: 10px;">
            @endif --}}

            <div class="d-sm-none d-lg-inline-block">
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </div>

        </a>


        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">
                Bienvenido, {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>

            @can('usuarios.index')
            <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                <i class="fa fa-cog"></i> Personalizar
            </a>
            @endcan

            {{--
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#"
                    data-id="{{ \Auth::id() }}"> --}}
            <a href="{{ route('password.request') }}" class="text-small dropdown-item has-icon"><i class="fa fa-lock ">
                </i>Cambiar Contraseña</a>


            <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                {{ csrf_field() }}
            </form>
        </div>


    </li>
    @else
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="image" src="#" class="rounded-circle mr-1"> --}}
            <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">{{ __('messages.common.login') }}
                / {{ __('messages.common.register') }}</div>
            <a href="{{ route('login') }}" class="dropdown-item has-icon">
                <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('register') }}" class="dropdown-item has-icon">
                <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
            </a>
        </div>
    </li>
    @endif
</ul>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <div class="btn-group dropstart">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
            {{ Auth::user()->unreadNotifications->count() }}
<span class="visually-hidden"></span>
</span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 300px; overflow-y: auto; width: 300px;">
    @foreach (Auth::user()->notifications as $notification)
    <li class="list-group-item" style="padding: 10px;">
        <div class="row" style="font-size: 13px;">
            <div class="col-8">
                <p style="margin: 0; padding: 0; max-width: 100%;">
                    {{ $notification->data['mensaje'] }}
                </p>
            </div>
            <div class="col-4 text-right">
                <small style="color: rgb(130, 130, 238); margin: 0; padding: 0;">
                    {{ $notification->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </li>
    @endforeach
</ul>
</div> --}}



<!-- Default dropleft button -->
{{-- <div class="btn-group dropleft">
    <button type="button" class="btn btn-warning" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell" style="font-size: 15px"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
            {{ Auth::user()->unreadNotifications->count() }}
<span class="visually-hidden"></span>
</span>
</button>
<div>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 500px; overflow-y: auto; width: 500px; background-color:white; padding:5px;">
        <h4>Total de Notificaciones: {{ Auth::user()->notifications->count() }}</h4>
        @foreach (Auth::user()->notifications->take(10) as $notification)
        <li class="list-group-item" style="padding: 10px;">
            <div class="row" style="font-size: 13px;">
                <div class="col-8">
                    <p style="margin: 0; padding: 0; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $notification->data['mensaje'] }}
                    </p>
                </div>
                <div class="col-4 text-right">
                    <small style="color: rgb(130, 130, 238); margin: 0; padding: 0;">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
</div> --}}

<!-- SimpleBar CSS -->

{{-- Prueba --}}