<?php
session_start();
require_once('autoload.php');

use Controller\PaginaController;

$pagina = new PaginaController;

$pagina->mostrarInicio();
?>