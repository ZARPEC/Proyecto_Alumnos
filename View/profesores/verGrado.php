<?php
use Controller\gradoController;

$gradoAlumnos= new gradoController();

?>


<div class="mt-5  bg-light">
    <h1 class="text-center mt-3">Listado de Alumnos</h1>
    <table id="example" class="display" width="100%"></table>
</div>
<div class="row justify-content-center">
    <div class="col-auto mt-3">
        <a class="btn btn-primary" role="button" href="index.php?action=pdfgradoAlumnos" target="_blank"> Generar PDF <i class="bi bi-filetype-pdf"></i></a>
        <a class="btn btn-primary" role="button" href="index.php?action=exelgradoAlumnos">Generar excel<i class="  bi bi-file-earmark-spreadsheet"></i></a>
        <a class="btn btn-primary" role="button" href="index.php?action=excelNotas">Cuadro de notas<i class="  bi bi-file-earmark-spreadsheet"></i></a>
    </div>
</div>
<script type="text/javascript">
    let dataAlumno = <?php echo json_encode($gradoAlumnos->mostrarAlumnosGrado()); ?>;
    let data = [];

    for (let i = 0; i < dataAlumno.length; i++) {
        data.push([dataAlumno[i].id, dataAlumno[i].nombreAlumno, dataAlumno[i].apellido, dataAlumno[i].grado,dataAlumno[i].curso,dataAlumno[i].fecha]);

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
            },
            {
                title: 'Curso'
            },{
                title:'fecha'
            }
        ],
        data: data
    });
</script>