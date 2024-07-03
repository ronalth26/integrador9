@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Foro</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Dashboard Content</h3>
                        <a class="btn btn-sm btn-outline-primary mb-3" data-toggle="modal" data-target="#showModal5" data-url="{{ route('posts.create')}}">
                            Crear Post
                        </a>
                        @if($posts->isEmpty())
                            <h4 class="text-center">No hay posts disponibles</h4>
                        @else
                            @foreach($posts as $post)
                            <div class="post-card mb-3 p-3 border rounded">
                                <div class="post-header d-flex align-items-center mb-2">
                                    <div>
                                        <h5 class="user-name m-0">{{ $post->user ? $post->user->name : 'Usuario Anónimo' }}</h5>
                                    </div>
                                </div>
                                <h4 class="post-title">{{ $post->name }}</h4>
                                <p class="post-extract">{{ $post->extract }}</p>
                                <div class="post-image mb-3">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded" alt="{{ $post->name }}">
                                    @else
                                        <img src="path/to/default-image.jpg" class="img-fluid rounded" alt="No Image">
                                    @endif
                                </div>
                                <div class="post-actions d-flex justify-content-end">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    .post-card {
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 16px;
        margin-bottom: 16px;
    }
    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }
    .user-avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    .user-name {
        margin: 0;
        font-size: 1.2em;
    }
    .post-title {
        font-size: 1.5em;
        margin-bottom: 8px;
    }
    .post-extract {
        font-size: 1em;
        margin-bottom: 16px;
    }
    .post-image img {
        width: 500%;
        max-width: 300px; /* Puedes ajustar el tamaño máximo de la imagen */
        height: auto;
        border-radius: 8px;
    }
    .post-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }
</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
