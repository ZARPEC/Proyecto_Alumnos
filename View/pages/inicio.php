<style>
    body {
        background-color: #f8f9fa;
    }

    .jumbotron {
        background-color: #007bff;
        color: #fff;
        padding: 2rem;
        border-radius: 10px;
    }

</style>

<!-- Contenido principal -->
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">¡Bienvenido!</h1>
        <p class="lead">Administra fácilmente la información de tus alumnos y sus calificaciones de manera eficiente.</p>
        <hr class="my-4">
        <p>Regístrate para comenzar a utilizar nuestro sistema.</p>
        <a class="btn btn-light btn-lg" href="index.php?action=crearCuenta" role="button">Regístrate</a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 animate__animated animate__pulse">
                <div class="card-body text-center">
                    <i class="fas fa-user-graduate icon-lg"></i>
                    <h5 class="card-title mt-3">Alumnos</h5>
                    <p class="card-text">Gestiona la información de tus alumnos de forma eficiente.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <i class="fas fa-chart-bar icon-lg"></i>
                    <h5 class="card-title mt-3">Calificaciones</h5>
                    <p class="card-text">Registra y analiza las calificaciones de tus alumnos.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <i class="fas fa-cog icon-lg"></i>
                    <h5 class="card-title mt-3">Configuración</h5>
                    <p class="card-text">Personaliza el sistema según tus necesidades.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h2>Últimos Alumnos Registrados</h2>
            <!-- Puedes agregar una lista de los últimos alumnos registrados aquí -->
        </div>
        <div class="col-lg-6">
            <h2>Noticias y Actualizaciones</h2>
            <!-- Puedes agregar un feed de noticias y actualizaciones aquí -->
        </div>
    </div>
</div>

<!-- Pie de página -->


<!-- Enlaces a Bootstrap JS y Popper.js (necesarios para ciertas funcionalidades de Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>