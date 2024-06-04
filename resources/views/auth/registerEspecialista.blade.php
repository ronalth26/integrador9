@extends('layouts.auth_app')
@section('title')
Tegistro
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4><i class="fas fa-user-md"></i> Registro de Especialista</h4>
    </div>

    <div class="card-body pt-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Nombre(s):</label><span class="text-danger">*</span>
                        <input id="firstName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus required>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellido Paterno:</label><span class="text-danger">*</span>
                        <input id="lastName" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" tabindex="2" placeholder="Ingrese su apellido paterno" value="{{ old('last_name') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="middle_name">Apellido Materno:</label><span class="text-danger">*</span>
                        <input id="middleName" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" tabindex="3" placeholder="Ingrese su apellido materno" value="{{ old('middle_name') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('middle_name') }}
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
                        <input id="password_confirmation" type="password" placeholder="Confirme su contraseña" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="6">
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Dirección:</label><span class="text-danger">*</span>
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" tabindex="7" placeholder="Ingrese su dirección" value="{{ old('address') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Fecha de Nacimiento:</label><span class="text-danger">*</span>
                        <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" tabindex="8" value="{{ old('birthdate') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('birthdate') }}
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