<?php

namespace Controller;

use Model\profesorModel;

class profesorController
{

    public function agregarProfesor()
    {

        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['fkusuario'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fkusuario = $_POST['fkusuario'];

            $datos = array(
                'nombre'=>$nombre,
                'apellido' => $apellido,
                'fkusuario' => $fkusuario
            );
            $respuesta = profesorModel::nuevoProfesor($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function MostrarProfesores(){
        $profesor=profesorModel::mostrarProfesor();
        return $profesor;
    }
}
