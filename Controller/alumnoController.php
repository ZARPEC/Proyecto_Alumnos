<?php

namespace Controller;

use Model\alumnoModel;

class alumnoController
{

    public function mostrarAlumnos()
    {

        $alumno = alumnoModel::mostrarAlumnos();
        return $alumno;
    }

    public function agregarAlumno()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['carnet'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $carnet = $_POST['carnet'];

            $datos = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'carnet' => $carnet
            );
            $respuesta = alumnoModel::agregarAlumno($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function editar()
    {
        $idAlumno = $_GET['idAlumno'];
        $idAlumno = alumnoModel::editarAlumno($idAlumno);
        return $idAlumno;
    }

    public function actualizar()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
            $datos = array(
                "idAlumno" => $_POST['idAlumno'],
                "nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido']
            );
            //Enviando los datos al modelo, para que se actualice el registro.
            $respuesta = alumnoModel::actualizarAlumno($datos);

            if ($respuesta) {
                header("Location: index.php?action=modificarAlumno");
            }
        }
    }

    public function borrar(){
        if( !empty($_GET['idAlumno'])){
            $alumno = alumnoModel::borrarAlumno($_GET['idAlumno']);
            return $alumno;
        }
    }

    public function confirmarBorrar(){
        if( !empty($_POST['idAlumno'])){
            $alumno = alumnoModel::borrarConfirmado($_POST['idAlumno']);
            if($alumno){ header("Location: index.php?action=modificarAlumno"); }
        }
        
    }
}