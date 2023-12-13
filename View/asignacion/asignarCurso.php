<?php

use Controller\alumnoController;
use Controller\asignacionController;
use Controller\gradoController;

if ($_SESSION['rol'] == '3' || $_SESSION['rol'] == '1') {
    $alumno = new alumnoController();
    $grado = new gradoController();
    $curso = new asignacionController();
    $asignar= new asignacionController();

?>


    <h1 class="text-center">Asignar curso alumno</h1>
    <div class="container w-75">

        <form method="POST" id="formulario" data-intro='Formulario para iniciar sesion'>


            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Alumno</label></div>
                    <div class="col-5">
                        <select name="fkalumno" class="form-select">
                            <?php
                            foreach ($alumno->mostrarAlumnos() as $row => $item) {
                                echo "<option value='{$item['id']}'>{$item['Nombre']} {$item['apellido']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Curso</label></div>
                    <div class="col-5">
                        <select name="fkcurso" class="form-select">
                        <?php
                            foreach ($curso->mostrarCursos() as $row => $item) {
                                echo "<option value='{$item['id']}'>{$item['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Grado</label></div>
                    <div class="col-5">
                        <select name="fkgrado" class="form-select">
                            <?php
                            foreach ($grado->MostrarGrado() as $row => $item) {
                                echo "<option value='{$item['id']}'>{$item['grado']}( {$item['nombreProfesor']})</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-outline-success btn-sm">Asignar</button>
                </div>
            </div>

        </form>

        <div id="passwordError" title="Error en password" hidden>
            <p>La contraseña es muy corta</p>
        </div>

        <div class="mt-4">

        </div>
    <?php
}

$resultado = $asignar->asignar();
if ($resultado == "error") {

    echo "<div class='alert alert-danger mt-5' role='alert'>
    ha ocurrido un error
    </div>";
} else if ($resultado == "guardado") {
    echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
    El alumno se ha agregado correctamente
    </div>";
}


    ?>