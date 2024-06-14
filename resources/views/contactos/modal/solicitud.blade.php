<div class="modal-header">
    <h5 class="modal-title" id="contactModalLabel">Solicitudes de Amistad</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
<div class="mb-3 d-flex">
    <div class="input-group mr-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="searchButton"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Desde</span>
        </div>
        <input type="date" id="startDate" class="form-control">
    </div>
    <div class="input-group ml-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Hasta</span>
        </div>
        <input type="date" id="endDate" class="form-control">
    </div>
</div>

    @if($solicitudes->isEmpty())
    <p class="text-center text-muted">No hay solicitudes de amistad pendientes.</p>
    @else
    <div class="list-group" id="solicitudesList">
        @foreach($solicitudes as $solicitud)
        <div class="list-group-item list-group-item-action flex-column align-items-start solicitud-item">
            <div class="d-flex w-100 justify-content-between">
                <div>
                    <h5 class="mb-1">Solicitud de: {{ $solicitud->emisor->name }} {{ $solicitud->emisor->ape_pat }}</h5>
                    <small class="text-muted">
                        <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($solicitud->fecha_envio)->format('d/m/Y') }}
                    </small>
                    <small class="text-muted ml-2">
                        <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($solicitud->fecha_envio)->format('H:i') }}
                    </small>
                </div>
                <div>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($solicitud->fecha_envio)->diffForHumans() }}</small>
                </div>
            </div>
            <p class="mb-1">{{ $solicitud->mensaje }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('contactos.estado', ['id' => $solicitud->emisor->id, 'opcion' => 2]) }}" class="btn btn-success btn-sm mr-2">
                    <i class="fas fa-check"></i> Aceptar
                </a>

                <a href="{{ route('contactos.estado', ['id' => $solicitud->emisor->id, 'opcion' => 3]) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-times"></i> Rechazar
                </a>

              
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        const solicitudesList = document.getElementById('solicitudesList');
        const solicitudItems = solicitudesList.getElementsByClassName('solicitud-item');

        searchButton.addEventListener('click', function() {
            filterSolicitudes(searchInput.value.toLowerCase(), startDate.value, endDate.value);
        });

        searchInput.addEventListener('input', function() {
            filterSolicitudes(searchInput.value.toLowerCase(), startDate.value, endDate.value);
        });

        startDate.addEventListener('input', function() {
            filterSolicitudes(searchInput.value.toLowerCase(), startDate.value, endDate.value);
        });

        endDate.addEventListener('input', function() {
            filterSolicitudes(searchInput.value.toLowerCase(), startDate.value, endDate.value);
        });

        function filterSolicitudes(searchValue, startDate, endDate) {
            Array.from(solicitudItems).forEach(function(item) {
                const name = item.querySelector('h5').innerText.toLowerCase();
                const date = item.querySelector('.fa-calendar-alt').nextSibling.textContent.trim();
                const matchesName = name.includes(searchValue);
                const matchesStartDate = !startDate || new Date(date) >= new Date(startDate);
                const matchesEndDate = !endDate || new Date(date) <= new Date(endDate);

                if (matchesName && matchesStartDate && matchesEndDate) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    });
</script>