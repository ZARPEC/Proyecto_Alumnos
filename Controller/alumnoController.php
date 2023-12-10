<?php
namespace Controller;

use Model\alumnoModel;

class alumnoController{

    public function mostrarAlumnos(){

        $alumno=alumnoModel::mostrarAlumnos();
        return $alumno;
    }

    public function agregarAlumno(){
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['carnet'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $carnet = $_POST['carnet'];

            $datos = array(
                'nombre'=>$nombre,
                'apellido' => $apellido,
                'carnet' => $carnet
            );
            $respuesta = alumnoModel::agregarAlumno($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

}


?>