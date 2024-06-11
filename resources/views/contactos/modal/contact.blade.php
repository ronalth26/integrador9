<div class="modal-header">
    <h5 class="modal-title" id="contactModalLabel">Contactar con {{$usuario->name}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('contactos.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Campo oculto para almacenar el ID del usuario receptor -->
        <input type="hidden" name="id_receptor" value={{$usuario->id}}>
        <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea name="mensaje" class="form-control" rows="6"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Contactar</button>
    </form>
</div>