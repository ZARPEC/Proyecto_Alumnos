<?php

namespace Model;

use Model\ConexionModel;

class asignacionModel
{

    public static function mostrarCursos()
    {

        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM cursos");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function asignar($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO asignacion(fkalumno,fkcurso,fkgrado,fecha) values(:alumno,:curso,:grado,:fecha)");
            $stmt->bindParam(":alumno", $datos['alumno'], \PDO::PARAM_STR);
            $stmt->bindParam(":curso", $datos['curso'], \PDO::PARAM_STR);
            $stmt->bindParam(":grado", $datos['grado'], \PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $datos['fecha'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }
}
