@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Post</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" required>
                            </div>
                            <div class="form-group">
                                <label for="extract">Extracto</label>
                                <textarea class="form-control" id="extract" name="extract" required>{{ $post->extract }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Contenido</label>
                                <textarea class="form-control" id="body" name="body" required>{{ $post->body }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Borrador</option>
                                    <option value="2" {{ $post->status == 2 ? 'selected' : '' }}>Publicado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_user">Usuario</label>
                                <select class="form-control" id="id_user" name="id_user" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $post->id_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_category">Categoría</label>
                                <select class="form-control" id="id_category" name="id_category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->id_category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
