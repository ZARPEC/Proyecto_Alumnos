<?php

namespace Model;

class ConexionModel
{
    public static function conectar()
    {
        $conn = new \PDO("mysql:host=127.0.0.1:3307;dbname=biblioteca", "root", "");

        return $conn;
    }
}
