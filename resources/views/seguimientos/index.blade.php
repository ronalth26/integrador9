@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h3 class="page__heading">
            <i class="fas fa-user-md mr-2" style="font-size: 1.25em;"></i> <!-- Icono de especialista -->
            Seguimiento de Pacientes
        </h3>

        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('contactos.showListaContactos', ['id' => 1 ]) }}">
            <i class="fas fa-address-book mr-1"></i> Historial Clínico
        </a>
    </div>
</section>

<div class="container">
    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between">
            <div class="form-inline">
                <!-- <label for="fecha_inicio" class="mr-2">Desde:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control mr-2">
                <label for="fecha_fin" class="mr-2">Hasta:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control mr-2">
                <button type="button" class="btn btn-primary mr-2">
                    <i class="fas fa-filter"></i> Filtrar por Fecha
                </button> -->
          
                <a class="btn btn-warning" data-toggle="modal" data-target="#showModal5" data-url="{{ route('seguimientos.create') }}">
                    <i class="fas fa-plus"></i> Nuevo Seguimiento
                </a>

            </div>
            <form method="GET" action="" class="form-inline">
                <div class="form-group mr-2">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
    </div>

    <table id="pacientesTable" class="table table-striped">
        <thead>
            <tr>
                <th>Nombre del Paciente</th>
                <th>Estado</th>
                <th>Última Revisión</th>
                <th>Siguiente Sesión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mario</td>
                <td class="estado-bien">Bien</td>
                <td>15/04/2023</td>
                <td>16/04/2023</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver Detalles</a>
                    <a href="#" class="btn btn-sm btn-primary">Seguimiento</a>
                </td>
            </tr>
            <!-- Puedes agregar más filas según sea necesario -->
        </tbody>
    </table>
</div>

<!-- Modals -->
<!-- @include('contactos.modal.details') -->

@endsection

@section('js')

@endsection