<?php

use Controller\profesorController;

$profesor = new profesorController();
?>
<div class="mt-5  bg-light">
    <h1 class="text-center mt-3">Listado de profesores</h1>
    <table id="example" class="display" width="100%"></table>
</div>
<div class="row justify-content-center">
    <div class="col-auto mt-3">
        <a class="btn btn-primary" role="button"  href="index.php?action=pdfProfesores">Generar PDF</a>
    </div>
</div>
<script type="text/javascript">
    let dataProfesores = <?php echo json_encode($profesor->MostrarProfesores()); ?>;
    let data = [];

    for (let i = 0; i < dataProfesores.length; i++) {
        data.push([dataProfesores[i].id, dataProfesores[i].nombre, dataProfesores[i].apellido]);

    }
    let table = new DataTable('#example', {
        columns: [{
                title: 'ID'
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