<?php
namespace Model;

class alumnoModel{

    public static function mostrarAlumnos(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function agregarAlumno($datos){
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO alumno(carnet, nombre,apellido) values(:carnet,:nom,:ape)");
            $stmt->bindParam(":carnet", $datos['carnet'], \PDO::PARAM_STR);
            $stmt->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":ape", $datos['apellido'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }
}