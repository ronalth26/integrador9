<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filtrarBtn = document.getElementById('filtrarBtn');
        const feedbacksTableBody = document.getElementById('feedbacksTableBody');
        const fechaInicio = document.getElementById('fechaInicio');
        const fechaFinal = document.getElementById('fechaFinal');

        if (!filtrarBtn || !feedbacksTableBody || !fechaInicio || !fechaFinal) {
            console.error('Uno o más elementos no se encontraron en el DOM.');
            return;
        }

        filtrarBtn.addEventListener('click', function() {
            console.log('Botón de filtro presionado');

            const fechaInicioVal = fechaInicio.value;
            const fechaFinalVal = fechaFinal.value;
            console.log('Fecha Inicio:', fechaInicioVal, 'Fecha Final:', fechaFinalVal);

            const rows = feedbacksTableBody.getElementsByTagName('tr');
            console.log('Número de filas en la tabla:', rows.length);

            for (let row of rows) {
                const fecha = row.cells[2].innerText;
                console.log('Fecha de la fila:', fecha);

                if (isDateInRange(fecha, fechaInicioVal, fechaFinalVal)) {
                    row.style.display = '';
                    console.log('Fila mostrada');
                } else {
                    row.style.display = 'none';
                    console.log('Fila oculta');
                }
            }
        });

        function isDateInRange(fecha, inicio, final) {
            if (!inicio && !final) return true;

            const date = new Date(fecha);
            const startDate = inicio ? new Date(inicio) : null;
            const endDate = final ? new Date(final) : null;

            console.log('Comparando fecha:', date, 'con inicio:', startDate, 'y final:', endDate);

            if (startDate && date < startDate) return false;
            if (endDate && date > endDate) return false;

            return true;
        }
    });
</script>