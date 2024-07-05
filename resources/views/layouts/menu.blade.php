<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('admin')
    <a class="nav-link" href="/usuarios">
        <i class="fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('admin')
    <a class="nav-link" href="/roles">
        <i class="fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan

    @can('admin')
    <a class="nav-link" href="/estados">
        <i class="fas fa-comment"></i><span>Feedback</span>
    </a>
    @endcan

    <!-- @can('usuarios')
    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a>
    @endcan -->

    @can('usuarios')
    <a class="nav-link" href="/feedbacks">
        <i class=" fas fa-comment"></i><span>Feddback</span>
    </a>
    @endcan
    @can('usuarios')
    <a class="nav-link" href="/contactos">
        <i class="fas fa-envelope"></i><span>Contactar</span>
    </a>
    @endcan
    @can('usuarios')
    <a class="nav-link" href="/seguimientos">
        <i class="fas fa-chart-line"></i><span>Seguimiento</span>
    </a>
    @endcan
   
    @can('admin')
    <a class="nav-link" href="/permisos">
        <i class="fas fa-key"></i></i><span>Permisos</span>
    </a>
    @endcan



    @can('admin')
    <a class="nav-link" href="/verificacion">
        <i class="fas fa-check-circle"></i><span>Verificación Especialista</span>
    </a>
    @endcan


    @can('usuarios')
    @if(auth()->user()->feedback)
    <a class="nav-link" href="/feedbacks">
        <i class=" fas fa-comment"></i><span>Feddback</span>
    </a>
    @endif
    @endcan

    @can('usuarios')
    @if(auth()->user()->consulta)
    <a class="nav-link" href="/contactos">
        <i class="fas fa-envelope"></i><span>Contactar</span>
    </a>
    @endif
    @endcan

    @can('usuarios')
    @if(auth()->user()->post)
    <a class="nav-link" href="/posts">
        <i class="fas fa-edit"></i><span>Foro</span>
    </a>
    @endif

    <!-- @can('usuarios')
    <a class="nav-link" href="/posts">
        <i class="fas fa-edit"></i><span>Foro</span>
    </a>
    @endcan -->

    @endcan

    @role('Especialista')
    <a class="nav-link" href="/revision">
        <i class="fas fa-check-circle"></i><span>Verificación</span>
    </a>
    @endrole



</li>