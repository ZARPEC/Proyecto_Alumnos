<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">

        <nav class="navbar bg-body-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://www.zarla.com/images/zarla-el-escribano-1x1-2400x2400-20220329-cywvjv9hkjt996b48vvb.png?crop=1:1,smart&width=250&dpr=2" width="80" height="60" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" >
                <a class="nav-link active  text-light" aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link  text-light" href="index.php?action=nosotros">Nosotros <i class="fa-solid fa-people-arrows fa-2xs"></i> </a>
                <a class="nav-link  text-light" href="index.php?action=contacto">contacto</a>

                <?php
                if (!empty($_SESSION['id'])) { //Tiene sesión activa
                ?>
                    <a class="nav-link  text-light" href="index.php?action=alquilar">Alquilar<i class="bi bi-book-fill"></i> </a>
                    <a class="nav-link  text-light" href="index.php?action=verAlquiler">libros alquilados</a>
                    <a class="nav-link text-light " href="index.php?action=buscar">ubicacion de libro</a>
                    <?php
                    if(!empty($_SESSION['rol'])&& $_SESSION['rol']=='s'){
                        ?>
                        <a class="nav-link text-light"  href="index.php?action=agregarLibro">Agregar libro</a>
                        <?php } ?>
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