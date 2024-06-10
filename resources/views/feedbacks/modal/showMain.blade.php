<!-- Modal 5 -->
<div class="modal fade" id="showModal5" tabindex="-1" aria-labelledby="showModalLabel5" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="padding: 20px">
            <!-- Spinner de carga -->
            <div id="loading-container-5" class="text-center" style="margin: 100px">
                <div class="spinner-border text-primary" role="status">
                </div>
                <p>Cargando...</p>
            </div>

            <div id="document-container-5" style="display: none;">
                <!-- El contenido dinámico se cargará aquí -->
            </div>
        </div>
    </div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="showModal1" tabindex="-1" aria-labelledby="showModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-md"> <!-- Cambiado a modal-md para tamaño mediano -->
        <div class="modal-content" style="padding: 20px">
            <!-- Spinner de carga -->
            <div id="loading-container-1" class="text-center" style="margin: 100px">
                <div class="spinner-border text-primary" role="status">
                </div>
                <p>Cargando...</p>
            </div>

            <div id="document-container-1" style="display: none;">
                <!-- El contenido dinámico se cargará aquí -->
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Modal para el Proceso
        $('#showModal5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var url = button.data('url'); // Extraer la información del atributo data-url

            // Mostrar el spinner y ocultar el contenido del documento
            $("#loading-container-5").show();
            $("#document-container-5").hide();

            // Hacer la solicitud AJAX
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Ocultar el spinner y mostrar el contenido del documento después de la carga
                    $("#loading-container-5").hide();
                    $("#document-container-5").html(response.html).show();
                },
                error: function() {
                    $("#loading-container-5").hide();
                    $("#document-container-5").html('<p>Error al cargar los datoss.</p>').show();
                }
            });
        });

        // Al cerrar el modal, reiniciar el contenido
        $('#showModal5').on('hidden.bs.modal', function() {
            // Asegurar que el spinner se muestre la próxima vez que se abra el modal
            $("#loading-container-5").show();
            $("#document-container-5").hide().html('');
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Modal para el Proceso
        $('#showModal1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var url = button.data('url'); // Extraer la información del atributo data-url

            // Mostrar el spinner y ocultar el contenido del documento
            $("#loading-container-1").show();
            $("#document-container-1").hide();

            // Hacer la solicitud AJAX
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Ocultar el spinner y mostrar el contenido del documento después de la carga
                    $("#loading-container-1").hide();
                    $("#document-container-1").html(response.html).show();
                },
                error: function() {
                    $("#loading-container-1").hide();
                    $("#document-container-1").html('<p>Error al cargar los datos1.</p>').show();
                }
            });
        });

        // Al cerrar el modal, reiniciar el contenido
        $('#showModal1').on('hidden.bs.modal', function() {
            // Asegurar que el spinner se muestre la próxima vez que se abra el modal
            $("#loading-container-1").show();
            $("#document-container-1").hide().html('');
        });
    });
</script>