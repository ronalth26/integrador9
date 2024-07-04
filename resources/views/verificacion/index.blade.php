@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Revision pdf</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead class="bg-primary">
                                <th style="">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Licencia</th>
                                <th style="color:#fff;">Hora</th>
                                <th style="color:#fff;">Fecha</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Archivo</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($revisiones as $revision)
                                <tr>
                                    <td>{{ $revision->id_revision }}</td>
                                    <td style="display:none;">{{ $revision->id_especialista }}</td>
                                    <td>{{ $revision->nombre }}</td>
                                    <td>{{ $revision->licencia }}</td>
                                    <td>{{ $revision->hora }}</td>
                                    <td>{{ $revision->fecha }}</td>
                                    <td style="padding: 10px; text-align:center; border-radius:50px;
                                        @if($revision->estado == 'Aceptado') 
                                            background-color: #dff0d8; /* Bootstrap success color */ 
                                        @elseif($revision->estado == 'Rechazado') 
                                            background-color: #f2dede; /* Bootstrap danger color */ 
                                        @elseif($revision->estado == 'Pendiente') 
                                            background-color: #fcf8e3; /* Bootstrap warning color */ 
                                        @endif">
                                        {{ $revision->estado }}
                                    </td>

                                    <td><a href="{{ url('uploads/' . $revision->pdf) }}" target="_blank">Ver PDF</a></td>
                                    <td>
                                        <button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#modalFeedback{{$revision->id_revision}}">
                                            Revisar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modales -->
@foreach ($revisiones as $revision)
<div class="modal fade" id="modalFeedback{{$revision->id_revision}}" tabindex="-1" role="dialog" aria-labelledby="modalFeedback{{$revision->id_revision}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFeedback{{$revision->id_revision}}Label">Detalles del Feedback ID: {{ $revision->id_revision }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <!-- Input oculto para almacenar el ID de la revisión -->
                    <input type="hidden" class="revision-id" value="{{ $revision->id_revision }}">
                    <!-- Botones para actualizar el estado -->
                    <button type="button" class="btn btn-success mr-2 update-status" data-revision-id="{{ $revision->id_revision }}" data-value="Aceptado">Aceptado</button>
                    <button type="button" class="btn btn-danger mr-2 update-status" data-revision-id="{{ $revision->id_revision }}" data-value="Rechazado">Rechazado</button>
                    <button type="button" class="btn btn-warning update-status" data-revision-id="{{ $revision->id_revision }}" data-value="Pendiente">Pendiente</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Incluir SweetAlert2 CSS y JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script para manejar la actualización del estado -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Captura el clic en cualquier botón dentro de los modales
    $('.modal-body button').click(function() {
        var revisionId = $(this).data('revision-id'); // Obtiene el ID de la revisión del atributo data-revision-id
        var nuevoEstado = $(this).data('value'); // Obtiene el valor del botón (Aceptado, Rechazado, Pendiente)

        // Envía la solicitud AJAX para actualizar el estado de la revisión
        $.ajax({
            type: 'PUT', // Método PUT para actualizar según RESTful
            url: "{{ route('verificacion.index') }}" + '/' + revisionId, // URL para la actualización según RESTful
            data: {
                _token: '{{ csrf_token() }}',
                estado_revision: nuevoEstado // Nuevo estado a enviar al servidor
            },
            success: function(response) {
                if (response.success) {
                    // Actualización exitosa, recargar la página o actualizar la tabla si es necesario
                    console.log('Estado actualizado con éxito');
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Estado actualizado con éxito',
                        showConfirmButton: false,
                        timer: 2000}).then(function(){
                            location.reload();
                        });
                    
                } else {
                    console.error('Error al actualizar el estado: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores si la solicitud AJAX falla
                console.error('Error al actualizar el estado: ' + error);
            }
        });
    });
});

</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@endsection
