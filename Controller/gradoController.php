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

    public function editarGrado()
    {

        $idGrado = $_GET['idGrado'];
        $idGrado = gradoModel::editarGrado($idGrado);
        return $idGrado;
    }

    public function actualizar()
    {
        if (!empty($_POST['grado']) && !empty($_POST['fkprofesor'])) {
            $datos = array(
                "grado" => $_POST['grado'],
                "fkprofesor" => $_POST['fkprofesor'],
                "idGrado" => $_POST['idGrado']
            );
            //Enviando los datos al modelo, para que se actualice el registro.
            $respuesta = gradoModel::actualizarGrado($datos);

            if ($respuesta) {
                header("Location: index.php?action=modificarGrado");
            }
        }
    }
}
