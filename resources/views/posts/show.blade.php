@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalles del Post</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $post->name }}</h3>
                        <p><strong>Slug:</strong> {{ $post->slug }}</p>
                        <p><strong>Extracto:</strong> {{ $post->extract }}</p>
                        <p><strong>Contenido:</strong> {{ $post->body }}</p>
                        <p><strong>Usuario:</strong> {{ $post->user ? $post->user->name : 'N/A' }}</p>
                        <p><strong>Categoría:</strong> {{ $post->category ? $post->category->name : 'N/A' }}</p>
                        <p><strong>Estado:</strong> {{ $post->status == 2 ? 'Publicado' : 'Borrador' }}</p>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
