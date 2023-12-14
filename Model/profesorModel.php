<?php

namespace Model;

use Model\ConexionModel;

class profesorModel
{

    public static function nuevoProfesor($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO profesor(nombre,apellido,fkusuario) values(:nom,:ape,:fkuser)");
            $stmt->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":ape", $datos['apellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkuser", $datos['fkusuario'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }

    public static function mostrarProfesor()
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT profesor.id,profesor.nombre, profesor.apellido, usuario.usuario FROM profesor INNER JOIN usuario ON profesor.fkusuario = usuario.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarProfesor($idProfesor)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT profesor.id,profesor.nombre, profesor.apellido, usuario.usuario FROM profesor INNER JOIN usuario ON profesor.fkusuario = usuario.id WHERE profesor.id = :id");
        $stmt->bindParam(':id', $idProfesor, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(); //1 reg. Fetch

    }

    public static function actualizarProfesor($datos)
    {
        $stmt = ConexionModel::conectar()->prepare("UPDATE profesor SET nombre = :nom, apellido =:apellido where profesor.id = :idProfesor");
        $stmt->bindParam(':nom', $datos['nombre'], \PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $datos['apellido'], \PDO::PARAM_STR);
        $stmt->bindParam(':idProfesor', $datos['idProfesor'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public static function borrarProfesor($idProfesor){
        $stmt = ConexionModel::conectar()->prepare("SELECT profesor.id,profesor.nombre, profesor.apellido, usuario.usuario FROM profesor INNER JOIN usuario ON profesor.fkusuario = usuario.id WHERE profesor.id = :id");
        $stmt->bindParam(':id',$idProfesor,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmado($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM profesor where profesor.id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
}
