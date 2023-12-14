<?php

use Controller\profesorController;

if ($_SESSION['rol'] == '1' || $_SESSION['rol'] == '3') {

    $profesor = new profesorController();
    $datos = $profesor->editar();
?>

    <h1 class="text-center">Datos Actuales</h1>
    <div class="container w-50">

        <form method="POST" id="formulario" data-intro='Formulario para iniciar sesion'>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>usuario</label></div>
                    <div class="col-5"><input type="text" class="form-control w-75" disabled value="<?php echo $datos['usuario'] ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Nombre</label></div>
                    <div class="col-10"><input class="form-control" type="text"  required disabled value="<?php echo $datos['nombre'] ?>"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Apellido</label></div>
                    <div class="col-10"><input type="text" class="w-75 form-control" disabled value="<?php echo $datos['apellido'] ?>"></div>
                </div>
            </div>

        </form>


        <h1 class="text-center">Nuevos Datos </h1>


        <form method="POST" id="formulario" data-intro='Formulario para iniciar sesion'>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>usuario</label></div>
                    <div class="col-5"><input type="text" name="usuario" id="usuario" class="form-control w-75" disabled value="<?php echo $datos['usuario'] ?>">
                    </div>
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
                    <div class="col-10"><input type="text" class="w-75 form-control" name="apellido" id="apellido"> </input></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-outline-success btn-sm">Actualizar</button>
                </div>
            </div>
            <input type='hidden' name='idProfesor' value='<?php echo $datos['id'] ?>'>
        </form>



        <div id="passwordError" title="Error en password" hidden>
            <p>La contraseña es muy corta</p>
        </div>

        <div class="mt-4">

        </div>
        <?php
        $resultado = $profesor->actualizar();
        if ($resultado == "error") {

            echo "<div class='alert alert-danger mt-5' role='alert'>
        ha ocurrido un error
        </div>";
        } else if ($resultado == "guardado") {
            echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
        El profesor se ha agregado correctamente
        </div>";
        }

        ?>
    </div>
<?php
}
?>