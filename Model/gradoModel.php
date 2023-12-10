<?php

namespace Model;

use Model\ConexionModel;

class gradoModel{

    public static function mostrarGrado(){
        $stmt = ConexionModel::conectar()->prepare("SELECT grado.id, grado.grado, CONCAT(profesor.nombre, ' ' , profesor.apellido) as nombreProfesor FROM grado INNER JOIN profesor ON profesor.id = grado.fkprofesor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function nuevoGrado($datos){
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
}