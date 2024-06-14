@extends('layouts.app')

@section('styles')
<style>
    .card-title {
        font-size: 1.5em;
        color: #343a40;
    }

    .card-text {
        font-size: 1.1em;
        color: #6c757d;
    }

    .text-warning {
        color: #ffc107 !important;
    }
</style>
@endsection

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h3 class="page__heading">
            <i class="fas fa-users mr-2" style="font-size: 1.25em;"></i> <!-- Icono de usuarios -->
            Contactar con usuarios
        </h3>

        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('contactos.showListaContactos', ['id' => 1 ]) }}">
            <i class="fas fa-address-book mr-1"></i> Ver mis contactos
        </a>

        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('contactos.solicitud', ['id' => 1 ]) }}">
            <i class="fas fa-user-friends mr-1"></i> Solicitudes
        </a>


    </div>
</section>


<div class="container">
    <form method="GET" action="{{ route('contactos.index') }}" class="mb-4">
        <div class="form-row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="filter_role" class="form-control">
                    <option value="">Filtrar por rol</option>
                    <option value="Especialista" {{ request('filter_role') == 'Especialista' ? 'selected' : '' }}>Especialista</option>
                    <option value="Discapacitado" {{ request('filter_role') == 'Discapacitado' ? 'selected' : '' }}>Discapacitado</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> <!-- Icono de búsqueda -->
                    Buscar
                </button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($usuarios as $usuario)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{ asset('img/perfil.png') }}" alt="Foto de perfil de {{ $usuario->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $usuario->name }}</h5>
                    <p class="card-text">{{ $usuario->frase }}</p>
                    <p>
                        @foreach($usuario->roles as $role)
                        <span class="badge
                            @if($role->name == 'Especialista') badge-info 
                            @elseif($role->name == 'Discapacitado') badge-light 
                            @endif">
                            <i class="fas 
                                @if($role->name == 'Especialista') fa-user-md 
                                @elseif($role->name == 'Discapacitado') fa-wheelchair 
                                @endif"></i>
                            {{ ucfirst($role->name) }}
                        </span>
                        @endforeach
                    </p>
                    <div class="d-flex justify-content-between align-items-center">

                        @if (!$contacto_encontrado->contains($usuario->id))
                        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal1" data-url="{{ route('contactos.show', ['id' => $usuario->id ]) }}">
                            Contactar
                        </a>

                        @else
                        <p class="text-primary">Pendiente</p>
                        @endif

                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#detailsModal" data-username="{{ $usuario->name }}" data-userroles="{{ $usuario->roles->pluck('name')->implode(', ') }}" data-userphrase="{{ $usuario->frase }}">
                                Ver Detalles
                            </button>
                        </div>



                        <small class="text-muted">
                            @for($i = 0; $i < 5; $i++) @if($i < $usuario->rating)
                                <i class="fas fa-star text-warning"></i>
                                @else
                                <i class="far fa-star text-warning"></i>
                                @endif
                                @endfor
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modals -->

@include('contactos.modal.details')

@endsection

@section('js')
<script>
    // Script to populate the Contact Modal with the user information
    $('#contactModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userId = button.data('userid');
        var userName = button.data('username');

        var modal = $(this);
        modal.find('#contactModalUserId').val(userId);
        modal.find('#contactModalLabel span').text(userName); // Corrección para mostrar el nombre del usuario en el título del modal
    });

    // Script to populate the Details Modal with the user information
    $('#detailsModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userName = button.data('username');
        var userRoles = button.data('userroles');
        var userPhrase = button.data('userphrase');

        var modal = $(this);
        modal.find('#detailsModalUserName').text(userName);
        modal.find('#detailsModalUserRoles').text(userRoles);
        modal.find('#detailsModalUserPhrase').text(userPhrase);
    });
</script>
@endsection