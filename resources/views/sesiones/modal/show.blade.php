<div class="modal-body">
    <input type="text" class="form-control mb-3" id="searchInput" placeholder="Buscar...">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Medicación</th>
                    <th>Diagnóstico</th>
                    <th>Observaciones</th>
                    <th>Resultado</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="sessionTableBody">
                @foreach($sesiones as $sesion)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sesion->fecha_inicio)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($sesion->fecha_fin)->format('Y-m-d') }}</td>
                    <td>{{ $sesion->medicacion }}</td>
                    <td>{{ $sesion->diagnostico }}</td>
                    <td>{{ $sesion->observaciones }}</td>
                    <td>{{ $sesion->resultado }}</td>
                    <td>
                        @php
                        $estadoClass = '';
                        switch ($sesion->estado) {
                        case 1:
                        $estadoClass = 'badge badge-primary';
                        break;
                        case 2:
                        $estadoClass = 'badge badge-secondary';
                        break;
                        case 3:
                        $estadoClass = 'badge badge-info';
                        break;
                        case 4:
                        $estadoClass = 'badge badge-success';
                        break;
                        default:
                        $estadoClass = 'badge badge-dark';
                        break;
                        }
                        @endphp
                        <span class="{{ $estadoClass }}">{{ $sesion->estado }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#sessionTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('#showModal5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var url = button.data('url');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#showModal5 .modal-body').html(response.html);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>