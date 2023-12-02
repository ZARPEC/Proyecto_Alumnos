<?php
namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        
        $modulo =match($enlace){
            "inicio"=>"View/pages/inicio.php",
            "nosotros"=>"View/pages/nosotros.php",
            "contacto"=>"View/pages/contacto.php",
            default => "View/pages/error.php"

        };
        return $modulo;
    }
}


?>