<?php
use Controller\alumnoController;



if (!empty($_SESSION['id']) && !empty($_SESSION['rol']) && $_SESSION['rol']=='1' ) {
    $alumno=new alumnoController();
    $listado = $alumno->MostrarAlumnos();

    echo "
    <div class='row justify-content-center align-items-center'>
    <table class='table table-striped table-bordered table-hover mt-5 w-50'>
    <thead class='table-dark'>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Carnet</th>
            <th scope='col'>Nombre</th>
            <th class='col'>Apellido</th>
            <th class='col'>Editar</th>
            <th class='col'>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    ";
    foreach ($listado as $row => $item) {
        echo "
            <tr class=' text-center table-secondary'>
                <td class='col'>{$item['id']}</td>
                <td class='col'>{$item['carnet']}</td>
                <td class='col'>{$item['Nombre']}</td>
                <td class='col'>{$item['apellido']}</td>
                <td class='col'><a class='alert-link' href='index.php?action=editarAlumno&idAlumno={$item['id']}'>editar</a></td>
                <td class='col'><a class='alert-link' href='index.php?action=eliminarAlumno&idAlumno={$item['id']}' >Eliminar</a></td>
            </tr>
        ";
    }
    echo " 
    </tbody>
    </table>
    </div>
    ";
}

?>