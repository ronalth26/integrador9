<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<section class="section" style="padding: 20px; background-color: #f4f6f9;">
    
    <div class="section-body" style="padding: 20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid #e9ecef;">
                    <div class="card-body" style="padding: 20px;">
                        <div class="container mt-5">
                            <h2 style="font-size: 20px; font-weight: 500; margin-bottom: 20px;">Crear Nuevo Post</h2>
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="name" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-heading"></i> Nombre
                                            </label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del post" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="slug" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-link"></i> Slug
                                            </label>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Ingrese el slug del post" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="extract" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-pen-nib"></i> Extracto
                                            </label>
                                            <textarea class="form-control" id="extract" name="extract" rows="3" placeholder="Ingrese un extracto del post" required></textarea>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="body" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-file-alt"></i> Cuerpo
                                            </label>
                                            <textarea class="form-control" id="body" name="body" rows="6" placeholder="Ingrese el cuerpo del post" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="status" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-toggle-on"></i> Estado
                                            </label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="1">Borrador</option>
                                                <option value="2">Publicado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="id_user" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-user"></i> Usuario
                                            </label>
                                            <select class="form-control" id="id_user" name="id_user" required>
                                                <option value="" disabled selected>Seleccione un usuario</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="id_category" style="font-size: 16px; font-weight: 400;">
                                                <i class="fas fa-tags"></i> Categoría
                                            </label>
                                            <select class="form-control" id="id_category" name="id_category" required>
                                                <option value="" disabled selected>Seleccione una categoría</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="font-size: 16px; font-weight: 500; width: 100%;">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
