<?php

use Controller\gradoController;

$grado = new gradoController();

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
    let dataGrado = <?php echo json_encode($grado->mostrarGrado()); ?>;
    let data = [];

    for (let i = 0; i < dataGrado.length; i++) {
        data.push([dataGrado[i].id, dataGrado[i].grado, dataGrado[i].nombreProfesor]);

    }
    let table = new DataTable('#example', {
        columns: [{
                title: 'ID'
            },
            {
                title: 'Grado'
            },
            {
                title: 'Nombre Profesor'
            }
        ],
        data: data
    });
</script>