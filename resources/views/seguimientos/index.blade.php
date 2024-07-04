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
        <!-- 
        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('contactos.showListaContactos', ['id' => 1 ]) }}">
            <i class="fas fa-address-book mr-1"></i> Historial Clínico
        </a> -->
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
                <th>Fecha Diagnóstico</th>
                <th>Sesión</th>
                <th>Siguiente Sesión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($seguimientos as $seguimiento)
            <tr>
                <td>{{ $seguimiento->paciente->name }}</td>
                <td>
                    @php
                    $estado = '';
                    switch ($seguimiento->estado) {
                    case 1:
                    $estado = 'Registro';
                    $badgeClass = 'badge badge-primary';
                    break;
                    case 2:
                    $estado = 'Diagnóstico';
                    $badgeClass = 'badge badge-secondary';
                    break;
                    case 3:
                    $estado = 'Seguimiento';
                    $badgeClass = 'badge badge-info';
                    break;
                    case 4:
                    $estado = 'Finalizado';
                    $badgeClass = 'badge badge-danger';
                    break;
                    default:
                    $estado = 'Desconocido';
                    $badgeClass = 'badge badge-dark';
                    break;
                    }
                    @endphp
                    <span class="{{ $badgeClass }}">{{ $estado }}</span>
                </td>
                <td>{{ \Carbon\Carbon::parse($seguimiento->fecha_inicio)->format('Y-m-d') }}</td>

                <td>{{ $seguimiento->ultimo_numero_sesion }}</td>


                @if ($seguimiento->sesion_siguiente !== '-')
                <td>{{ \Carbon\Carbon::parse($seguimiento->sesion_siguiente)->format('Y-m-d') }}</td>
                @else
                <td>{{ $seguimiento->sesion_siguiente }}</td>
                @endif


                <td>
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#showModal5" data-url="{{ route('sesiones.create', ['seguimiento_id' => $seguimiento->id, 'ultimo_numero_sesion' => $seguimiento->ultimo_numero_sesion]) }}">
                        Nueva
                    </a>

                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#showModal5" data-url="{{ route('sesiones.show', ['sesione' => $seguimiento->id]) }}">
                        Historial
                    </a>

                    @if ($seguimiento->estado !== 4)
                    <a class="btn btn-sm btn-danger" href="{{ route('sesiones.destroy', ['sesione' => $seguimiento->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $seguimiento->id }}').submit();">
                        Cerrar
                    </a>
                    <form id="delete-form-{{ $seguimiento->id }}" action="{{ route('sesiones.destroy', ['sesione' => $seguimiento->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif

                </td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>

@endsection

@section('js')

@endsection