<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<section class="section"></section>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center text-primary">
                <i class="fas fa-pen-fancy mr-2"></i> Crear Nuevo Post
            </h3>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-heading mr-2"></i> Nombre del Post
                            </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del post" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">
                                <i class="fas fa-link mr-2"></i> Slug
                            </label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Ingrese el slug del post" required>
                        </div>
                        <div class="form-group">
                            <label for="extract">
                                <i class="fas fa-align-left mr-2"></i> Extracto
                            </label>
                            <textarea class="form-control" id="extract" name="extract" rows="3" placeholder="Ingrese un extracto del post" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">
                                <i class="fas fa-toggle-on mr-2"></i> Estado
                            </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Borrador</option>
                                <option value="2">Publicado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_user">
                                <i class="fas fa-user mr-2"></i> Usuario
                            </label>
                            <select class="form-control" id="id_user" name="id_user" required>
                                <option value="" disabled selected>Seleccione un usuario</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body">
                                <i class="fas fa-align-justify mr-2"></i> Cuerpo
                            </label>
                            <textarea class="form-control" id="body" name="body" rows="6" placeholder="Ingrese el cuerpo del post" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id_category">
                                <i class="fas fa-folder-open mr-2"></i> Categoría
                            </label>
                            <select class="form-control" id="id_category" name="id_category" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">
                                <i class="fas fa-image mr-2"></i> Imagen
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Seleccionar imagen</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save mr-2"></i> Guardar
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Mostrar el nombre del archivo seleccionado
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<!-- #region -->