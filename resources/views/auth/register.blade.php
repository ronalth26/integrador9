@extends('layouts.auth_app')
@section('title')
Registrar Discapacitado
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Registrar Discapacitado</h4>
    </div>

    <div class="card-body pt-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tipo" value="3">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre Completo:</label><span class="text-danger">*</span>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Ingrese Nombre Completo" value="{{ old('name') }}" autofocus required>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>

                <!-- Nuevo campo para Apellido Paterno -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ape_pat">Apellido Paterno:</label><span class="text-danger">*</span>
                        <input id="ape_pat" type="text" class="form-control{{ $errors->has('ape_pat') ? ' is-invalid' : '' }}" name="ape_pat" tabindex="1" placeholder="Ingrese Apellido Paterno" value="{{ old('ape_pat') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('ape_pat') }}
                        </div>
                    </div>
                </div>

                <!-- Nuevo campo para Apellido Materno -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ape_mat">Apellido Materno:</label><span class="text-danger">*</span>
                        <input id="ape_mat" type="text" class="form-control{{ $errors->has('ape_mat') ? ' is-invalid' : '' }}" name="ape_mat" tabindex="1" placeholder="Ingrese Apellido Materno" value="{{ old('ape_mat') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('ape_mat') }}
                        </div>
                    </div>
                </div>

                <!-- Nuevo campo para Fecha de Nacimiento -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fec_nacimiento">Fecha de Nacimiento:</label><span class="text-danger">*</span>
                        <input id="fec_nacimiento" type="date" class="form-control{{ $errors->has('fec_nacimiento') ? ' is-invalid' : '' }}" name="fec_nacimiento" value="{{ old('fec_nacimiento') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('fec_nacimiento') }}
                        </div>
                    </div>
                </div>

                <!-- Nuevo campo para Dirección -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label><span class="text-danger">*</span>
                        <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" placeholder="Ingrese Dirección" value="{{ old('direccion') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('direccion') }}
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label><span class="text-danger">*</span>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ingrese Email" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="control-label">Contraseña:</label><span class="text-danger">*</span>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Ingrese Contraseña" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>

                <!-- Confirmación de Contraseña -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label">Confirma Contraseña:</label><span class="text-danger">*</span>
                        <input id="password_confirmation" type="password" placeholder="Confirme Contraseña" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" tabindex="2">
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    </div>
                </div>

                <!-- Número CONADIS -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="conadis_number">Número CONADIS:</label><span class="text-danger">*</span>
                        <input id="conadis_number" type="text" class="form-control{{ $errors->has('conadis_number') ? ' is-invalid' : '' }}" name="conadis_number" placeholder="Ingrese Número CONADIS" value="{{ old('conadis_number') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('conadis_number') }}
                        </div>
                    </div>
                </div>

                <!-- Tipo de Discapacidad -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_tipo">Tipo de Discapacidad:</label><span class="text-danger">*</span>
                        {!! Form::select('id_tipo', $tipoDiscapacidad, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Grado de Discapacidad -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="grado">Grado de Discapacidad:</label><span class="text-danger">*</span>
                        <input id="grado" type="text" class="form-control{{ $errors->has('grado') ? ' is-invalid' : '' }}" name="grado" placeholder="Ingrese Grado de Discapacidad" value="{{ old('grado') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('grado') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Registrar
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
