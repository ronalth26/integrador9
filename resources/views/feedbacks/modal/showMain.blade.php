<!-- Modal para el Proveedores, esté si está bien y mejorado. -->
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
            </div>
        </div>
    </div>
</div>

<!-- Modal para los detalles del estado -->
<div class="modal fade" id="showModal6" tabindex="-1" aria-labelledby="showModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="padding: 20px">
            <!-- Spinner de carga -->
            <div id="loading-container-6" class="text-center" style="margin: 100px">
                <div class="spinner-border text-primary" role="status">
                </div>
                <p>Cargando...</p>
            </div>
            <div id="document-container-6" style="display: none;">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() 
    {
        // Modal para el state_details
        $('#showModal6').on('show.bs.modal', function() {
            $("#loading-container-6").show();
            $("#document-container-6").hide();
            setTimeout(function() {
                $("#loading-container-6").hide();
                $("#document-container-6").show();
            }, 3000);
        });
        $('#showModal6').on('hidden.bs.modal', function() {
            $("#loading-container-6").show();
            $("#document-container-6").hide();
        });


        // Modal para el Proceso
        $('#showModal5').on('show.bs.modal', function() {
            // Mostrar el spinner y ocultar el contenido del documento
            $("#loading-container-5").show();
            $("#document-container-5").hide();

            // Simular una carga de datos de 3 segundos (esto debe ser reemplazado por tu lógica real)
            setTimeout(function() {
                // Ocultar el spinner y mostrar el contenido del documento después de la carga
                $("#loading-container-5").hide();
                $("#document-container-5").show();
            }, 3000); // 3000 milisegundos = 3 segundos
        });

        // Al cerrar el modal, reiniciar el contenido
        $('#showModal5').on('hidden.bs.modal', function() {
            // Asegurar que el spinner se muestre la próxima vez que se abra el modal
            $("#loading-container-5").show();
            $("#document-container-5").hide();
        });

    });
</script>