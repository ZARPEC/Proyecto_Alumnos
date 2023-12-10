<?php
use Controller\profesorController;




if ($_SESSION['rol']=='3' || $_SESSION['rol']=='1' ) {
    $profesor=new profesorController();
    $listado = $profesor->MostrarProfesores();

    echo "
    <div class='row justify-content-center align-items-center'>
    <table class='table table-striped table-bordered table-hover mt-5 w-50'>
    <thead class='table-dark'>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
            <th class='col'>Usuario</th>
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
                <td class='col'>{$item['nombre']}</td>
                <td class='col'>{$item['apellido']}</td>
                <td class='col'>{$item['usuario']}</td>
                <td class='col'><a class='alert-link' href='index.php?action=editarAlquiler&idAlquiler={$item['id']}'>editar</a></td>
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

