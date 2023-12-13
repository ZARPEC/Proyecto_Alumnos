<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">

        <nav class="navbar bg-body-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="Assets/logo.png" width="60" height="40" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active  text-light" aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link  text-light" href="index.php?action=nosotros">Nosotros <i class="fa-solid fa-people-arrows fa-2xs"></i> </a>
                <a class="nav-link  text-light" href="index.php?action=contacto">contacto</a>

                <?php
                if (!empty($_SESSION['id'])) { //Tiene sesión activa
                ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alumnos</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?action=modificarAlumno">Modificar Alumnos</a>
                                <a class="dropdown-item" href="index.php?action=listadoAlumno">Listado Alumnos</a>
                                <a class="dropdown-item" href="index.php?action=agregarAlumno">Agregar alumno</a>
                                <div class="dropdown-divider"></div>
                                <?php
                                if ($_SESSION['rol'] == '3' || $_SESSION['rol'] == '1') {
                                ?>
                                    <a class="dropdown-item" href="index.php?action=asignarCurso">asignar curso</a>
                                <?php } ?>
                            </div>
                        </li>
                    </ul>
                    <?php
                    if ($_SESSION['rol'] == '3' || $_SESSION['rol'] == '1') { ?>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profesores</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.php?action=modificarProfesor">Modificar Profesor</a>
                                    <a class="dropdown-item" href="index.php?action=listadoProfesores">Listado profesores</a>
                                    <a class="dropdown-item" href="index.php?action=agregarProfesor">Agregar profesor</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php?action=asignarGrado">Asignar grado</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grados</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.php?action=modificarGrado">Modificar grado</a>
                                    <a class="dropdown-item" href="index.php?action=listadoGrado">Listado de grados</a>
                                    <a class="dropdown-item" href="index.php?action=agregarGrado">Agregar grado</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php?action=asignarGrado">Asignar grado</a>
                                </div>
                            </li>

                        </ul>
                    <?php }
                    ?>
                    <a class="nav-link  text-light" href="index.php?action=logout">Cerrar sesión</a>
                <?php } else { //No ha iniciado sesión
                ?>
                    <a class="nav-link  text-light" href="index.php?action=login">Iniciar sesión</a>
                    <a class="nav-link  text-light" href="index.php?action=crearCuenta">Crear Cuenta</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>