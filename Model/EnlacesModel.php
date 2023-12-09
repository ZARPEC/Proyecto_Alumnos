<?php
namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        
        $modulo =match($enlace){
            "inicio"=>"View/pages/inicio.php",
            "nosotros"=>"View/pages/nosotros.php",
            "contacto"=>"View/pages/contacto.php",
            "login"=>"View/users/login.php",
            "crearCuenta"=>"View/users/nuevoUsuario.php",
            "agregarProfesor"=>"View/profesores/agregarProfesor.php",
            "listadoProfesores"=>"view/profesores/listadoProfesores.php",
            "modificarProfesor"=>"View/profesores/modificarProfesor.php",
            "logout"=>"View/users/logout.php",
            default => "View/pages/error.php"

        };
        return $modulo;
    }
}


?>