@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Revision pdf</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('revision.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-4 pr-4 pt-4 col-12" style="background:#FDFDFF;">
                        <label for="pdfFile" class="form-label">Sube tu archivo PDF</label>
                        <input class="form-control" type="file" id="pdfFile" name="pdfFile" accept=".pdf" required>
                    </div>
                    <div class="p-4 col-12" style="background:#FDFDFF;">
                        <button type="submit" class="btn btn-primary">Subir PDF</button>
                    </div>
                </form>
                
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead class="bg-primary">
                                <th style="display:none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Licencia</th>
                                <th style="color:#fff;">Hora</th>
                                <th style="color:#fff;">Fecha</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Archivo</th>
                            </thead>
                            <tbody>
                                @foreach ($revisiones as $revision)
                                <tr>
                                    <td style="display:none;">{{ $revision->id_especialista }}</td>
                                    <td>{{ $revision->nombre }}</td>
                                    <td>{{ $revision->licencia }}</td>
                                    <td>{{ $revision->hora }}</td>
                                    <td>{{ $revision->fecha }}</td>
                                    <td style="padding: 10px; text-align:center; border-radius:50px;
                                        @if($revision->estado == 'Aceptado') 
                                            background-color: #dff0d8; /* Bootstrap success color */ 
                                        @elseif($revision->estado == 'Rechazado') 
                                            background-color: #f2dede; /* Bootstrap danger color */ 
                                        @elseif($revision->estado == 'Pendiente') 
                                            background-color: #fcf8e3; /* Bootstrap warning color */ 
                                        @endif">
                                        {{ $revision->estado }}
                                    </td>
                                    <td><a href="{{ url('uploads/' . $revision->pdf) }}" target="_blank">Ver PDF</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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