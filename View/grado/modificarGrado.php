<?php

use Controller\gradoController;

if (!empty($_SESSION['id']) && !empty($_SESSION['rol']) && $_SESSION['rol']=='1' ) {
    $grado=new gradoController();
    $listado = $grado->MostrarGrado();

    echo "
    <div class='row justify-content-center align-items-center'>
    <table class='table table-striped table-bordered table-hover mt-5 w-50'>
    <thead class='table-dark'>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Grado</th>
            <th scope='col'>Nombre Profesor</th>
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
                <td class='col'>{$item['grado']}</td>
                <td class='col'>{$item['nombreProfesor']}</td>
                <td class='col'><a class='alert-link' href='index.php?action=editarGrado&idGrado={$item['id']}'>editar</a></td>
                <td class='col'><a class='alert-link' href='index.php?action=eliminarAlquiler&idAlquiler={$item['id']}' >Eliminar</a></td>
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