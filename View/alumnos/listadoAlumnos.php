<?php

use Controller\alumnoController;

$alumno = new alumnoController();

?>
<div class="mt-5  bg-light">
    <h1 class="text-center mt-3">Listado de Alumnos</h1>
    <table id="example" class="display" width="100%"></table>
</div>
<div class="row justify-content-center">
    <div class="col-auto mt-3">
        <button type="button" class="btn btn-light btn-lg" href="index.php?action=crearPDF">Generar PDF</button>
    </div>
</div>
<script type="text/javascript">
    let dataAlumno = <?php echo json_encode($alumno->MostrarAlumnos()); ?>;
    let data = [];

    for (let i = 0; i < dataAlumno.length; i++) {
        data.push([dataAlumno[i].id, dataAlumno[i].carnet, dataAlumno[i].Nombre, dataAlumno[i].apellido]);

    }
    let table = new DataTable('#example', {
        columns: [{
                title: 'ID'
            },
            {
                title: 'Carnet'
            },
            {
                title: 'Nombre'
            },
            {
                title: 'Apellido'
            }
        ],
        data: data
    });
</script>