<?php
namespace Controller;

use Model\asignacionModel;


class asignacionController{

    public function mostrarCursos(){

        $cursos=asignacionModel::mostrarCursos();
        return $cursos;
    }

    public function asignar(){
        if (!empty($_POST['fkalumno']) && !empty($_POST['fkcurso']) && !empty($_POST['fkgrado'])) {
            $alumno = $_POST['fkalumno'];
            $curso = $_POST['fkcurso'];
            $grado = $_POST['fkgrado'];

            $datos = array(
                'alumno'=>$alumno,
                'curso' => $curso,
                'grado' => $grado,
                'fecha'=>date("Y/m/d")
            );
            $respuesta = asignacionModel::asignar($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
}
?>

