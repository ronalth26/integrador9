<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    @if(\Illuminate\Support\Facades\Auth::user())
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="image" src="{{ asset('img/logo2.png') }}" class="rounded-circle mr-1 thumbnail-rounded user-thumbnail"> -->
            <div class="d-sm-none d-lg-inline-block" style="text-transform: uppercase;">
                Hola, {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">
                Bienvenido, {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </div>
            <!-- <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                <i class="fa fa-user"></i> Editar Perfil -->
            </a>

            <a class="dropdown-item has-icon" data-toggle="modal" data-target="#showModal5" data-url="{{ route('usuarios.edit', ['usuario' => \Auth::id() ]) }}">
                <i class="fa fa-user"></i> Editar Perfil
            </a>

            <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}">
                <i class="fa fa-lock"></i> Cambiar Contraseña
            </a>
            <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); localStorage.clear(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
    @else
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="image" src="#" class="rounded-circle mr-1"> --}}
            <div class="d-sm-none d-lg-inline-block">Hola</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Iniciar Sesión / Registrarse</div>
            <a href="{{ route('login') }}" class="dropdown-item has-icon">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('register') }}" class="dropdown-item has-icon">
                <i class="fas fa-user-plus"></i> Registrarse
            </a>
        </div>
    </li>
    @endif
</ul>