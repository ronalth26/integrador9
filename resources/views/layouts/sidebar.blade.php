<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="135" alt="Infyom Logo">

        <!-- <img class="navbar-brand-full app-header-logo tritanopia-filter" src="{{ asset('img/logo.png') }}" width="135" alt="Infyom Logo"> -->

        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo2.png') }}" width="25px" style="margin-top: 20px;" alt="" />
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>

<style>
    .tritanopia-filter {
        filter: grayscale(100%) sepia(100%) hue-rotate(90deg);
        /* Convertir la imagen a escala de grises y ajustar el tono */
        border-color: blueviolet;
        /* Cambiar el color del borde */
        background-color: red;
        /* Cambiar el color de fondo */
    }
</style>