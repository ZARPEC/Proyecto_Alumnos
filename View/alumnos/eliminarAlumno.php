<?php

use Controller\alumnoController;

$alumno = new alumnoController;
$datos=$alumno->borrar();
?>
<form method="POST">
    <p>¿Desea Eliminar Al alumno?</p>
    <?php echo $datos['Nombre'] . " " . $datos['apellido'];  ?>
    <br>

    <input type="hidden" name="idAlumno" value="<?php echo $datos['id']; ?>">

    <br>
    <button type="submit" class="btn btn-primary">Confirmar</button>
<?php $alumno->confirmarBorrar() ?>

</form>