<section class="section">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center text-primary">
                    <i class="fas fa-pen-fancy mr-2"></i> Crear Nuevo Seguimiento
                </h3>
                <form action="{{ route('seguimientos.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="row">
                        <!-- Información del paciente -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nombre_paciente">
                                    <i class="fas fa-user mr-2"></i> Nombre del Paciente
                                </label>
                                <select class="form-control" id="nombre_paciente" name="nombre_paciente" required>
                                    <option value="" disabled selected>Seleccione un paciente</option>
                                    @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->name }} {{ $paciente->ape_pat }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="diagnostico">
                                    <i class="fas fa-stethoscope mr-2"></i> Diagnóstico
                                </label>
                                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" placeholder="Ingrese el diagnóstico del paciente" required style="height: 150px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_inicio">
                                    <i class="fas fa-calendar-alt mr-2"></i> Fecha de Inicio
                                </label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaActual }}" required>
                            </div>

                        </div>
                        <!-- Información del seguimiento -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="observaciones">
                                    <i class="fas fa-notes-medical mr-2"></i> Observaciones
                                </label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="6" placeholder="Ingrese observaciones del seguimiento" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="medicacion">
                                    <i class="fas fa-pills mr-2"></i> Medicación
                                </label>
                                <textarea style="height: 150px;" class="form-control" id="medicacion" name="medicacion" rows="3" placeholder="Ingrese la medicación recetada" required></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="proxima_cita">
                                    <i class="fas fa-calendar-check mr-2"></i> Próxima Cita
                                </label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                            </div>
                            -->
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8