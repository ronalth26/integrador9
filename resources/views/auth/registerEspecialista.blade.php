@extends('layouts.auth_app')
@section('title')
Registro
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4><i class="fas fa-user-md"></i> Registro de Especialista</h4>
    </div>

    <div class="card-body pt-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tipo" value="2">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre(s):</label><span class="text-danger">*</span>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus required>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ape_pat">Apellido Paterno:</label><span class="text-danger">*</span>
                        <input id="ape_pat" type="text" class="form-control{{ $errors->has('ape_pat') ? ' is-invalid' : '' }}" name="ape_pat" tabindex="2" placeholder="Ingrese su apellido paterno" value="{{ old('ape_pat') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('ape_pat') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ape_mat">Apellido Materno:</label><span class="text-danger">*</span>
                        <input id="ape_mat" type="text" class="form-control{{ $errors->has('ape_mat') ? ' is-invalid' : '' }}" name="ape_mat" tabindex="3" placeholder="Ingrese su apellido materno" value="{{ old('ape_mat') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('ape_mat') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label><span class="text-danger">*</span>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ingrese su correo electrónico" name="email" tabindex="4" value="{{ old('email') }}" required autofocus>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="control-label">Contraseña:</label><span class="text-danger">*</span>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Establezca una contraseña" name="password" tabindex="5" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label">Confirmar Contraseña:</label><span class="text-danger">*</span>
                        <input id="password_confirmation" type="password" placeholder="Confirme su contraseña" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="6" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label><span class="text-danger">*</span>
                        <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" tabindex="7" placeholder="Ingrese su dirección" value="{{ old('direccion') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('direccion') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fec_nacimiento">Fecha de Nacimiento:</label><span class="text-danger">*</span>
                        <input id="fec_nacimiento" type="date" class="form-control{{ $errors->has('fec_nacimiento') ? ' is-invalid' : '' }}" name="fec_nacimiento" tabindex="8" value="{{ old('fec_nacimiento') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('fec_nacimiento') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_id">Tipo de Especialidad:</label><span class="text-danger">*</span>
                        {!! Form::select('tipo_id', $tipoEspecialista, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="licencia">Licencia:</label><span class="text-danger">*</span>
                        <input id="licencia" type="text" class="form-control{{ $errors->has('licencia') ? ' is-invalid' : '' }}" name="licencia" placeholder="Ingrese su licencia" value="{{ old('licencia') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('licencia') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="9">
                            Registrarse
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a>
</div>
@endsection
