
<!-- Modal -->

                <!-- Sección de Detalles del Reporte -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedbackModalLabel">Historial Feedbacks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para fechas de inicio y final -->
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody id="feedbacksTableBody">
                                    @foreach($feedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->id }}</td>
                                            <td>{{ $feedback->descripcion }}</td>
                                            <td>{{ $feedback->fecha }}</td>
                                            <td>{{ $feedback->hora }}</td>
                                            <td>{{ $feedback->estadoFeedback->estado ?? 'No disponible' }}</td>
                                            <td>{{ $feedback->tipoFeedback->nombre ?? 'No disponible' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
{{-- <<<<<<< HEAD --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
{{-- 
=======
            <div class="modal-body">
                <table class="table table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->descripcion }}</td>
                                <td>{{ $feedback->fecha }}</td>
                                <td>{{ $feedback->hora }}</td>
                                <td>{{ $feedback->estado }}</td>
                                <td>{{ $feedback->tipo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
>>>>>>> 91d00a000751bb1f5dd4799d27dc9b52c822cf4f --}}
