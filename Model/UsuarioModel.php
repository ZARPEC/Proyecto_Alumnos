<?php

namespace Model;

use Model\ConexionModel;


class UsuarioModel
{

    public static function login($datos)
    {
        $stmt = conexionModel::conectar()->prepare("SELECT * FROM usuario where usuario=:usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();
        //Si hay un resultado que coincide
        return $stmt->fetch(); //devolviendo la respuesta
    }

    public static function CrearCuenta($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO usuario(nombres,apellidos,usuario,password,fkrol) values(:nom,:ape,:user,:pass,:rol)");
            $stmt->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":ape", $datos['apellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":user", $datos['usuario'], \PDO::PARAM_STR);
            $stmt->bindParam(":pass", $datos['password'], \PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function mostrarRol()
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM rol");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mostrarUsuario()
    {

        $stmt = ConexionModel::conectar()->prepare(("SELECT * from usuario WHERE fkrol = '2'"));
        $stmt -> execute();
        return $stmt->fetchAll();
    }
}
