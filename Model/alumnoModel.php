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

    public static function editarAlumno($idAlquiler){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno WHERE alumno.id = :id");
        $stmt->bindParam(':id',$idAlquiler,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function actualizarAlumno($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE alumno SET Nombre = :nom, apellido =:apellido where alumno.id = :idAlumno");
        $stmt->bindParam(':nom',$datos['nombre'],\PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$datos['apellido'],\PDO::PARAM_STR);
        $stmt->bindParam(':idAlumno',$datos['idAlumno'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public static function borrarAlumno($idAlumno){
        $stmt = ConexionModel::conectar()->prepare("SELECT * From alumno where alumno.id = :id");
        $stmt->bindParam(':id',$idAlumno,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    
    public static function borrarConfirmado($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM alumno where alumno.id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
}