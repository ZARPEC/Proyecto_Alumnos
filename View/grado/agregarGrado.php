<?php

use Controller\gradoController;
use Controller\profesorController;

$grado= new gradoController();
$profesor= new profesorController();
?>

<h1 class="text-center">Agregar Grado</h1>
<div class="container w-50">

    <form method="POST" id="formulario" data-intro='Formulario para iniciar sesion'>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Grado</label></div>
                <div class="col-10"><input type="text" class="w-75 form-control" name="grado" id="apellido"> </input></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>usuario</label></div>
                <div class="col-5">
                    <select name="fkprofesor" class="form-select">
                        <?php
                        foreach ($profesor->MostrarProfesores() as $row => $item) {
                            echo "<option value='{$item['id']}'>{$item['nombre']} {$item['apellido']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <button type="submit" class="btn btn-outline-success btn-sm">Agregar</button>
            </div>
        </div>

    </form>

    <div id="passwordError" title="Error en password" hidden>
        <p>La contraseña es muy corta</p>
    </div>

    <div class="mt-4">

    </div>
    <?php
    $resultado = $grado->agregarGrado();
    if ($resultado == "error") {

        echo "<div class='alert alert-danger mt-5' role='alert'>
        ha ocurrido un error
        </div>";
    }else if($resultado=="guardado"){
        echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
        El grado se ha agregado correctamente
        </div>";
    }

    ?>
</div>