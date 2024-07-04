@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <table class="table table-stripedd mt-2">
                            <thead class="bg-primary">
                                <th style="display:none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Usuario</th>
                                <th style="color:#fff;">Feedback</th>
                                <th style="color:#fff;">Consulta</th>
                                <th style="color:#fff;">Post</th>
                                <th style="color:#fff;">Acciones</th>

                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <form action="{{ route('permisos.update', $usuario->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td style="display:none;">{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>
                                            @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <input type="hidden" name="feedback" value="0">
                                            <input type="checkbox" name="feedback" value="1" {{ $usuario->feedback == 1 ? 'checked' : '' }}>
                                            <label for="feedback">
                                                {{ $usuario->feedback == 1 ? 'Desbloqueado' : 'Bloqueado' }}
                                            </label>
                                        </td>
                                        <td>
                                            <input type="hidden" name="consulta" value="0">
                                            <input type="checkbox" name="consulta" value="1" {{ $usuario->consulta == 1 ? 'checked' : '' }}>
                                            <label for="consulta">
                                                {{ $usuario->consulta == 1 ? 'Desbloqueado' : 'Bloqueado' }}
                                            </label>
                                        </td>
                                        <td>
                                            <input type="hidden" name="post" value="0">
                                            <input type="checkbox" name="post" value="1" {{ $usuario->post == 1 ? 'checked' : '' }}>
                                            <label for="post">
                                                {{ $usuario->post == 1 ? 'Desbloqueado' : 'Bloqueado' }}
                                            </label>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info">Guardar</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include SweetAlert2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
@endsection