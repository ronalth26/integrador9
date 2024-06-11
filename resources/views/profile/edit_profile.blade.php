<div id="EditProfileModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Contenido del Modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Perfil</h5>
                <button type="button" aria-label="Cerrar" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            {!! Form::model(auth()->user(), ['method' => 'PATCH', 'route' => ['usuarios.update',auth()->user()->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', auth()->user()->name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="ape_pat">Apellido Paterno</label>
                                        {!! Form::text('ape_pat',auth()->user()->ape_pat, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="ape_mat">Apellido Materno</label>
                                        {!! Form::text('ape_mat', auth()->user()->ape_mat, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::text('email', auth()->user()->email, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="fec_nacimiento">Fecha de Nacimiento</label>
                                        {!! Form::date('fec_nacimiento', auth()->user()->fec_nacimiento, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        {!! Form::text('direccion', auth()->user()->direccion, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                     
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
        </div>
    </div>
</div>