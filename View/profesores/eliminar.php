<?php
use Controller\profesorController;

$profesor= new profesorController();

$datos=$profesor->borrar();
?>


<form method="POST">
    <p>¿Desea Eliminar Al profesor?</p>
    <?php echo $datos['nombre'] . " " . $datos['apellido'];  ?>
    <br>

    <input type="hidden" name="idProfesor" value="<?php echo $datos['id']; ?>">

    <br>
    <button type="submit" class="btn btn-primary">Confirmar</button>
<?php $profesor->confirmarBorrar() ?>

</form>