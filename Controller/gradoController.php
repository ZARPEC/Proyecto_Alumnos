<?php

namespace Controller;

use model\gradoModel;

class gradoController
{

    public function mostrarGrado()
    {

        $grado = gradoModel::mostrarGrado();
        return $grado;
    }

    public function agregarGrado()
    {
        if (!empty($_POST['grado']) && !empty($_POST['fkprofesor'])) {
            $grado = $_POST['grado'];
            $fkprofesor = $_POST['fkprofesor'];


            $datos = array(
                'grado' => $grado,
                'fkprofesor' => $fkprofesor
            );
            $respuesta = gradoModel::nuevoGrado($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrarAlumnosGrado()
    {
        $grado = gradoModel::mostrarAlumnoGrado();
        return $grado;
    }
}
