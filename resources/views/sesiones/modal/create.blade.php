<section class="section">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center text-primary">
                    <i class="fas fa-calendar-plus mr-2"></i> Nueva Sesión # {{ $ultimo_numero_sesion }}
                </h3>
                <form action="{{ route('sesiones.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <!-- Hidden inputs to send seguimiento_id and numero -->
                    <input type="hidden" name="seguimiento_id" value="{{ $seguimiento_id }}">
                    <input type="hidden" name="numero" value="{{ $ultimo_numero_sesion }}">
                    
                    <div class="row">
                        <!-- Información básica -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicio">
                                    <i class="fas fa-calendar-alt mr-2"></i> Fecha de Sesión
                                </label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaActual }}" required>
                            </div>
                            <div class="form-group">
                                <label for="medicacion">
                                    <i class="fas fa-pills mr-2"></i> Medicación
                                </label>
                                <textarea style="height: 100px;" class="form-control" id="medicacion" name="medicacion" rows="3" placeholder="Ingrese la medicación" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="observaciones">
                                    <i class="fas fa-comment-medical mr-2"></i> Observaciones
                                </label>
                                <textarea style="height: 100px;" class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Ingrese observaciones" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_fin">
                                    <i class="fas fa-calendar-alt mr-2"></i> Siguiente Sesión
                                </label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                            </div>
                            <div class="form-group">
                                <label for="resultados">
                                    <i class="fas fa-notes-medical mr-2"></i> Resultados
                                </label>
                                <textarea style="height: 100px;" class="form-control" id="resultados" name="resultados" rows="3" placeholder="Ingrese los resultados"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnostico">
                                    <i class="fas fa-stethoscope mr-2"></i> Diagnóstico
                                </label>
                                <textarea style="height: 100px;" class="form-control" id="diagnostico" name="diagnostico" rows="3" placeholder="Ingrese el diagnóstico" required></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-warning" style="margin-right: 20px;">
                            <i class="fas fa-save mr-2"></i> Guardar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
