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
            "modificarAlumno"=>"View/alumnos/modificarAlumno.php",
            "eliminarAlumno"=>"View/alumnos/eliminarAlumno.php",
            "listadoAlumno"=>"View/alumnos/listadoAlumnos.php",
            "pdfAlumnos"=>"View/alumnos/pdf.php",
            "verGrado"=>"View/profesores/verGrado.php",
            "pdfgradoAlumnos"=>"view/profesores/pdfGradoAlumnos.php",
            "asignarCurso"=>"View/asignacion/asignarCurso.php",
            "agregarGrado"=>"View/grado/agregarGrado.php",
            "exelgradoAlumnos"=>"View/profesores/excelGrado.php",
            "pdfProfesores"=>"View/extras/Pdf.php",
            "listadoGrado"=>"View/grado/listadoGrado.php",
            "editarAlumno"=>"view/alumnos/editar.php",
            "eliminarGrado"=>"View/grado/eliminar.php",
            "eliminarProfesor"=>"View/profesores/eliminar.php",
            "editarProfesor"=>"View/profesores/editarProfesor.php",
            "editarGrado"=>"View/grado/editar.php",
            "pdfGrado"=>"View/grado/pdfGrado.php",
            "excelNotas"=>"View/profesores/excelnotas.php",
            "modificarGrado"=>"View/grado/modificarGrado.php",
            "agregarAlumno"=>"View/alumnos/agregarAlumno.php",
            "logout"=>"View/users/logout.php",
            default => "View/pages/error.php"

        };
        return $modulo;
    }
}


?>