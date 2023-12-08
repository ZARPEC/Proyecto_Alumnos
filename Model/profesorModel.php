<?php
namespace Model;

use Model\ConexionModel;

class profesorModel{

    public static function nuevoProfesor($datos){
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

    public static function mostrarProfesor() {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM profesor");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>