<?php

use Controller\UsuarioController;
$usuario = new UsuarioController;
$rol = $usuario;

?>

<h1 class="text-center">Login</h1>
<div class="container w-50">

    <form method="POST">

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombre" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Apellido</label></div>
                <div class="col-10"><input class="form-control" type="text" name="apellido" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Usuario</label></div>
                <div class="col-10"><input class="form-control" type="text" name="usuario" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Contraseña</label></div>
                <div class="col-10"><input type="password" class="w-75 form-control" name="password"> </input></div>
            </div>
        </div>


        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Rol</label></div>
                <div class="col-5">
                    <select name="rol" class="form-select">
                        <?php
                        foreach ($rol->mostrarRol() as $row => $item) {
                            echo "<option value='{$item['id']}'>{$item['rol']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <button type="submit" class="btn btn-outline-success btn-sm">Crear Cuenta</button>
            </div>
        </div>





    </form>
    <div class="mt-4">

    </div>
    <?php
    $resultado = $usuario->UsuarioNuevo();
    if ($resultado == "Error") {

        echo "<div class='alert alert-danger mt-5' role='alert'>
        Error en los datos
        </div>";
    } else if ($resultado == "guardado") {
        echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
        Usuario creado correctamente
        </div>";
    }

    ?>



</div>