<div class="tab-content" id="pills-tabContent-process" style="padding: 25px;">
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
