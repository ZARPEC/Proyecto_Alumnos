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
                'nombre' => $nombre,
                'apellido' => $apellido,
                'fkusuario' => $fkusuario
            );
            $respuesta = profesorModel::nuevoProfesor($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function MostrarProfesores()
    {
        $profesor = profesorModel::mostrarProfesor();
        return $profesor;
    }

    public function editar()
    {

        $idProfesor = $_GET['idProfesor'];
        $idprofesor = profesorModel::editarProfesor($idProfesor);
        return $idprofesor;
    }

    public function actualizar()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
            $datos = array(
                "idProfesor" => $_POST['idProfesor'],
                "nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido']
            );
            //Enviando los datos al modelo, para que se actualice el registro.
            $respuesta = profesorModel::actualizarProfesor($datos);

            if ($respuesta) {
                header("Location: index.php?action=modificarProfesor");
            }
        }
    }

    public function borrar(){
        if( !empty($_GET['idProfesor'])){
            $alumno = profesorModel::borrarProfesor($_GET['idProfesor']);
            return $alumno;
        }
    }

    
    public function confirmarBorrar(){
        if( !empty($_POST['idProfesor'])){
            $alumno = profesorModel::borrarConfirmado($_POST['idProfesor']);
            if($alumno){ header("Location: index.php?action=modificarProfesor"); }
        }
        
    }

}
