<?php

namespace Model;

use Model\ConexionModel;

class gradoModel
{

    public static function mostrarGrado()
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT grado.id, grado.grado, CONCAT(profesor.nombre, ' ' , profesor.apellido) as nombreProfesor FROM grado INNER JOIN profesor ON profesor.id = grado.fkprofesor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function nuevoGrado($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO grado(grado,fkprofesor) values(:grado,:fkprofesor)");
            $stmt->bindParam(":grado", $datos['grado'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkprofesor", $datos['fkprofesor'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }

    public static function mostrarAlumnoGrado()
    {
        $nombreProfesor=$_SESSION['usuario'];
        $stmt = ConexionModel::conectar()->prepare(
            "SELECT asignacion.id,alumno.carnet,alumno.Nombre nombreAlumno,alumno.apellido,grado.grado, cursos.Nombre curso,asignacion.fecha FROM asignacion
            INNER JOIN grado ON asignacion.fkgrado=grado.id 
            INNER JOIN profesor ON grado.fkprofesor=profesor.id
            INNER JOIN alumno ON alumno.id=asignacion.fkalumno
            INNER JOIN cursos ON asignacion.fkcurso=cursos.id
            WHERE profesor.nombre='$nombreProfesor'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarGrado($idGrado)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT grado.id, grado.grado, CONCAT(profesor.nombre, ' ' , profesor.apellido) as nombreProfesor FROM grado INNER JOIN profesor ON profesor.id = grado.fkprofesor WHERE grado.id = :id");
        $stmt->bindParam(':id', $idGrado, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(); //1 reg. Fetch

    }

    public static function actualizarGrado($datos)
    {
        $stmt = ConexionModel::conectar()->prepare("UPDATE grado SET grado.grado = :grado, fkprofesor =:fkprofesor where grado.id = :idGrado");
        $stmt->bindParam(':grado', $datos['grado'], \PDO::PARAM_STR);
        $stmt->bindParam(':fkprofesor', $datos['fkprofesor'], \PDO::PARAM_STR);
        $stmt->bindParam(':idGrado', $datos['idGrado'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
}
