<section class="section" style="padding: 20px;">
    <div class="d-flex align-items-center mb-3">
        <h3 class="page__heading">Editar Usuario</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuarios.update', $user->id]]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '50', 'pattern' => '[A-Za-z ]+']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ape_pat">Apellido Paterno</label>
                                    {!! Form::text('ape_pat', $user->ape_pat, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '50', 'pattern' => '[A-Za-z ]+']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ape_mat">Apellido Materno</label>
                                    {!! Form::text('ape_mat', $user->ape_mat, ['class' => 'form-control', 'maxlength' => '50', 'pattern' => '[A-Za-z ]+']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '50']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fec_nacimiento">Fecha de Nacimiento</label>
                                    {!! Form::date('fec_nacimiento', $user->fec_nacimiento, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    {!! Form::text('direccion', $user->direccion, ['class' => 'form-control', 'maxlength' => '100']) !!}
                                </div>
                            </div>

                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>