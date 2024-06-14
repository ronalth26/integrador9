<div class="modal-header">
    <h5 class="modal-title" id="modalListaContactosLabel">Lista de Contactos</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="input-group mb-3">
        <input type="text" id="searchName" class="form-control" placeholder="Buscar por nombre" aria-label="Buscar por nombre" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="btnSearch">Buscar</button>
        </div>
    </div>

    <div class="list-group">
        @forelse ($contactos as $contacto)
        <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $contacto->emisor->name }} {{ $contacto->emisor->ape_pat }}</h5>
                <small>{{ $contacto->fecha_revision}}</small>
            </div>
            <p class="mb-1">Mensaje: {{ $contacto->mensaje }}</p>
            <small>Amigos desde: {{ $contacto->fecha_revision }}</small>
        </div>
        @empty
        <div class="list-group-item">
            No tienes contactos aceptados.
        </div>
        @endforelse
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>

<script>
    // Script para filtrar por nombre en la lista de contactos
    document.getElementById('btnSearch').addEventListener('click', function() {
        var input, filter, list, items, name, i, txtValue;
        input = document.getElementById('searchName');
        filter = input.value.toUpperCase();
        list = document.querySelector('.list-group');
        items = list.getElementsByClassName('list-group-item');

        for (i = 0; i < items.length; i++) {
            name = items[i].getElementsByTagName('h5')[0];
            txtValue = name.textContent || name.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                items[i].style.display = '';
            } else {
                items[i].style.display = 'none';
            }
        }
    });
</script>
