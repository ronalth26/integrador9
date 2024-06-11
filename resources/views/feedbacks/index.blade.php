@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Feedback</h3>
    </div>
</section>

<button type="button" class="add_proceso load-content5 btn-primary" data-toggle="modal" data-target="#showModal5" data-url="{{ route('feedbacks.showHistorial', ['id' => 1]) }}">
    Historial Feedbacks
</button>

<button type="button" class="btn btn-link">
    <a href="{{ route('feedbacks.indexP') }}" style="text-decoration: none; color: inherit;">Prueba</a>
</button>

{!! Form::open(['route' => 'feedbacks.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="card">
    <div class="card-body">
        <table class="table table-striped mt-2">
            <thead style="background-color: #6777ef;">
                <tr>
                    <th style="color:#fff;">
                        <h4>Enviemos una recomendación!!</h4>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color:#000000;">
                        <h6>Escribe tu recomendación en el recuadro:</h6>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Descripcion</label>
                <div class="textarea-container" style="width: 100%; height: 150px; overflow: auto; border: 1px solid #ccc; padding: 10px; box-sizing: border-box; resize: vertical;">
                    {!! Form::textarea('descripcion', null, ['class' => 'textarea-box', 'rows' => 6, 'style' => 'width: 100%; height: 100%; border: none; outline: none; resize: none; font-family: inherit; font-size: inherit;']) !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="tipo">Tipo</label>
                {!! Form::select('tipo', $opcionesTransformadas, null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@include('feedbacks.modal.saveFeedback')    

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

@endsection
