
<section class="section" style="padding: 20px; background-color: #f4f6f9;">
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
                                <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente" placeholder="Ingrese el nombre del paciente" required>
                            </div>
                            <div class="form-group">
                                <label for="edad">
                                    <i class="fas fa-birthday-cake mr-2"></i> Edad
                                </label>
                                <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese la edad del paciente" required>
                            </div>
                            <div class="form-group">
                                <label for="genero">
                                    <i class="fas fa-venus-mars mr-2"></i> Género
                                </label>
                                <select class="form-control" id="genero" name="genero" required>
                                    <option value="" disabled selected>Seleccione el género</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="diagnostico">
                                    <i class="fas fa-stethoscope mr-2"></i> Diagnóstico
                                </label>
                                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" placeholder="Ingrese el diagnóstico del paciente" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">
                                    <i class="fas fa-calendar-alt mr-2"></i> Fecha de Inicio
                                </label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
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
                                <textarea class="form-control" id="medicacion" name="medicacion" rows="3" placeholder="Ingrese la medicación recetada" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="proxima_cita">
                                    <i class="fas fa-calendar-check mr-2"></i> Próxima Cita
                                </label>
                                <input type="date" class="form-control" id="proxima_cita" name="proxima_cita" required>
                            </div>
                            <div class="form-group">
                                <label for="archivo">
                                    <i class="fas fa-file-upload mr-2"></i> Subir Archivo
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                                    <label class="custom-file-label" for="archivo">Seleccionar archivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-save mr-2"></i> Guardar Seguimiento
                        </button>
                        <a href="{{ route('seguimientos.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-times mr-2"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8
