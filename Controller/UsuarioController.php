<?php

namespace Controller;

use Model\UsuarioModel;

class UsuarioController
{
    public function login()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = ($_POST['usuario']);
            $password = ($_POST['password']);

            $datos = array(
                'usuario' => $usuario,
            );
            $respuesta = UsuarioModel::login($datos);
            //comparar contraseña cifrada con la de la bd
            if (!empty($respuesta['usuario'])) {
                $resultado = password_verify($password, $respuesta['password']);

                if ($resultado) { //Hubo coincidencia
                    $_SESSION['usuario'] = $respuesta['usuario'];
                    $_SESSION['nombres'] = $respuesta['nombres'];
                    $_SESSION['apellidos'] = $respuesta['apellidos'];
                    $_SESSION['id'] = $respuesta['id'];
                    $_SESSION['rol'] = $respuesta['rol'];
                    header("location: index.php?action=inicio&id={$respuesta['id']}");
                } else {
                    return "Error";
                }
            } else {
                return "ErrorUs";
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: index.php?action=inicio");
    }

    public function UsuarioNuevo()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['rol'])) {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];


            $password = password_hash($password, PASSWORD_DEFAULT);

            $rol = $_POST['rol'];

            $datos = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'usuario' => $usuario,
                'password' => $password,
                'rol' => $rol
            );
            $respuesta = UsuarioModel::CrearCuenta($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrarRol()
    {
        $rol = UsuarioModel::mostrarRol();
        return $rol; //se van a la vista
    }
}
