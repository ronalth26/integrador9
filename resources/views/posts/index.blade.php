@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="margin-right:40px;">Foro</h3>
         <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('posts.create')}}">
                        Crear Post
                    </a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                   

                    @if($posts->isEmpty())
                            <h4 class="text-center">No hay posts disponibles</h4>
                        @else
                            <table class="table table-striped">
                                <thead class="bg-primary">
                                <tr>
                                        <th class="text-light">ID</th>
                                        <th class="text-light">Nombre</th>
                                        <th class="text-light">Slug</th>
                                        <th class="text-light">Extracto</th>
                                        <th class="text-light">Usuario</th>
                                        <th class="text-light">Categoría</th>
                                        <th class="text-light">Acciones</th>
                                        <th class="text-light">Publicar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->extract }}</td>
                                        <td>{{ $post->user ? $post->user->name : 'N/A' }}</td>
                                        <td>{{ $post->category ? $post->category->name : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.integrador9.com&quote={{ urlencode($post->name) }}" target="_blank">
                                                <i class="fab fa-facebook"></i> Comparte tu animo
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
