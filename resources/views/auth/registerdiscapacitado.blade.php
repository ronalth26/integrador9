@extends('layouts.auth_app')
@section('title')
    Register
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Register</h4></div>

        <div class="card-body pt-1">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre Completo:</label><span class="text-danger">*</span>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}" autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label><span class="text-danger">*</span>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Email address" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña:</label><span class="text-danger">*</span>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Set account password" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Confirma Contraseña:</label><span class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirm account password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <!-- Número CONADIS -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="conadis_number">Número CONADIS:</label><span class="text-danger">*</span>
                            <input id="conadis_number" type="text" class="form-control{{ $errors->has('conadis_number') ? ' is-invalid': '' }}" name="conadis_number" placeholder="Enter CONADIS Number" value="{{ old('conadis_number') }}" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('conadis_number') }}
                            </div>
                        </div>
                    </div>
                    <!-- Tipo de Discapacidad -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disability_type">Tipo de Discapacidad:</label><span class="text-danger">*</span>
                            <input id="disability_type" type="text" class="form-control{{ $errors->has('disability_type') ? ' is-invalid': '' }}" name="disability_type" placeholder="Enter Disability Type" value="{{ old('disability_type') }}" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('disability_type') }}
                            </div>
                        </div>
                    </div>
                    <!-- Grado de Discapacidad -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disability_degree">Grado de Discapacidad:</label><span class="text-danger">*</span>
                            <input id="disability_degree" type="text" class="form-control{{ $errors->has('disability_degree') ? ' is-invalid': '' }}" name="disability_degree" placeholder="Enter Disability Degree" value="{{ old('disability_degree') }}" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('disability_degree') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Already have an account ? <a href="{{ route('login') }}">SignIn</a>
    </div>
@endsection
