<?php

use Controller\alumnoController;

if (!empty($_SESSION['id'])) {
    $alumno = new alumnoController();
    $datos = $alumno->editar();


    ob_start();

?>
    <h1 class="text-center">editar Alumno</h1>
    <div class="container w-50 h-100">

        <form method="POST" class="mt-5">
            <h1 class="text-center">Datos actuales</h1>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Carnet</label></div>
                    <div class="col-10"><input class="form-control" type="text" required disabled value="<?php echo $datos['carnet'] ?>"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Nombre</label></div>
                    <div class="col-10"><input class="form-control" type="text" required disabled value="<?php echo $datos['Nombre'] ?>"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Apellido</label></div>
                    <div class="col-10"><input type="text" class="w-75 form-control" disabled value="<?php echo $datos['apellido'] ?>"></div>
                </div>
            </div>


        </form>


        <form method="POST" class="mt-5">
            <h1 class="text-center">Datos nuevos</h1>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Carnet</label></div>
                    <div class="col-10"><input class="form-control" type="text" name="carnet" required disabled value="<?php echo $datos['carnet'] ?>"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Nombre</label></div>
                    <div class="col-10"><input class="form-control" type="text" name="nombre" required></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Apellido</label></div>
                    <div class="col-10"><input type="text" class="w-75 form-control" name="apellido"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-outline-success btn-sm mb-5">Agregar</button>
                </div>
            </div>
            <input type='hidden' name='idAlumno' value='<?php echo $datos['id'] ?>'>
        </form>

    <?php
}
$resultado = $alumno->actualizar();
if ($resultado == "error") {

    echo "<div class='alert alert-danger mt-5' role='alert'>
    ha ocurrido un error
    </div>";
} else if ($resultado == "guardado") {
    echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
    El grado se ha agregado correctamente
    </div>";
}
    ?>