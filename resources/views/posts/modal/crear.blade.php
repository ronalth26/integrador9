<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Dashboard Content</h3>
                    </div>
                    <div class="container mt-5">
                        <h2>Crear Nuevo Post</h2>
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del post" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Ingrese el slug del post" required>
                            </div>
                            <div class="form-group">
                                <label for="extract">Extracto</label>
                                <textarea class="form-control" id="extract" name="extract" rows="3" placeholder="Ingrese un extracto del post" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Cuerpo</label>
                                <textarea class="form-control" id="body" name="body" rows="6" placeholder="Ingrese el cuerpo del post" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Borrador</option>
                                    <option value="2">Publicado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_user">Usuario</label>
                                <select class="form-control" id="id_user" name="id_user" required>
                                    <option value="" disabled selected>Seleccione un usuario</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_category">Categoría</label>
                                <select class="form-control" id="id_category" name="id_category" required>
                                    <option value="" disabled selected>Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>  
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
</section>