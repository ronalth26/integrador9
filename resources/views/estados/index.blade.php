@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Historial Feedback</h3>
        </div>
        <form id="filterForm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fechaInicio">Fecha Inicio:</label>
                    <input type="date" id="fechaInicio" class="form-control" name="fecha_inicio">
                </div>
                <div class="col-md-6">
                    <label for="fechaFinal">Fecha Final:</label>
                    <input type="date" id="fechaFinal" class="form-control" name="fecha_final">
                </div>
                <div class="col-md-6 ">
                    <input type="text" id="buscar" class="form-control w-100 p-1 mt-2" name="buscar" placeholder="Buscar">
                </div>
                <div class="col-md-6 text-center mt-2">
                    <button type="button" id="filtrarBtn" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </div>
        </form>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th class="text-light">ID</th>
                                        <th class="text-light">Descripción</th>
                                        <th class="text-light">Fecha</th>
                                        <th class="text-light">Hora</th>
                                        <th class="text-light">Estado</th>
                                        <th class="text-light">Tipo</th>
                                        <th class="text-light">Acciones</th> <!-- Nuevo th para el botón -->
                                    </tr>
                                </thead>
                                <tbody id="feedbacksTableBody"> <!-- Agregado ID al tbody -->
                                    @foreach($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $feedback->id }}</td>
                                        <td>{{ $feedback->descripcion }}</td>
                                        <td>{{ $feedback->fecha }}</td>
                                        <td>{{ $feedback->hora }}</td>
                                        <td>{{ $feedback->estadof->estado }}</td>
                                        <td>{{ $feedback->tipof->nombre }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFeedback{{$feedback->id}}">
                                                Revisar Feedback
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

    @foreach($feedbacks as $feedback)
    <!-- Modal para detalles del feedback -->
    <div class="modal fade" id="modalFeedback{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFeedback{{$feedback->id}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFeedback{{$feedback->id}}Label">Detalles del Feedback ID: {{ $feedback->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal con detalles -->
                    <div class="text-center">
                        <!-- Añadido un input hidden para almacenar el ID del feedback -->
                        <input type="hidden" id="feedbackId" value="{{ $feedback->id }}">
                        <button type="button" class="btn btn-success mr-2" data-feedback-id="{{ $feedback->id }}" data-value="2">Aceptar</button>
                        <button type="button" class="btn btn-danger mr-2" data-feedback-id="{{ $feedback->id }}" data-value="3">Rechazar</button>
                        <button type="button" class="btn btn-warning" data-feedback-id="{{ $feedback->id }}" data-value="4">Revisión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Captura el clic en cualquier botón dentro de los modales
            $('.modal-body button').click(function() {
                var feedbackId = $(this).data('feedback-id'); // Obtiene el ID del feedback del atributo data-feedback-id
                var nuevoEstado = $(this).data('value'); // Obtiene el valor del botón (2, 3 o 4)

                // Envía la solicitud AJAX
                $.ajax({
                    type: 'PUT', // Método PUT para la actualización según RESTful
                    url: "{{ route('estados.index') }}" + '/' + feedbackId, // URL para la actualización según RESTful
                    data: 
                    {
                        _token: '{{ csrf_token() }}', // Añade el token CSRF para protección
                        _method: 'PUT', // Método PUT para Laravel
                        estado_feedback: nuevoEstado // Datos a enviar al servidor
                    },
                    success: function(response) {
                        if (response.success) {
                            // Actualización exitosa, puedes hacer algo si es necesario
                            console.log('Estado actualizado con éxito');
                            location.reload();
                        } else {
                            console.error('Error al actualizar el estado: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Maneja los errores si la solicitud AJAX falla
                        console.error('Error al actualizar el estado: ' + error);
                    }
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#filtrarBtn').on('click', function() {
            var fechaInicio = $('#fechaInicio').val();
            var fechaFinal = $('#fechaFinal').val();
            var buscar = $('#buscar').val().toLowerCase();

            $('#feedbacksTableBody tr').each(function() {
                var fecha = $(this).find('td:nth-child(3)').text();
                var textoFila = $(this).text().toLowerCase();

                var mostrarFila = true;

                // Filtrar por fecha
                if (fechaInicio && fechaFinal) {
                    mostrarFila = mostrarFila && (fecha >= fechaInicio && fecha <= fechaFinal);
                } else if (fechaInicio) {
                    mostrarFila = mostrarFila && (fecha >= fechaInicio);
                } else if (fechaFinal) {
                    mostrarFila = mostrarFila && (fecha <= fechaFinal);
                }

                // Filtrar por búsqueda de texto
                if (buscar) {
                    mostrarFila = mostrarFila && textoFila.includes(buscar);
                }

                if (mostrarFila) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>