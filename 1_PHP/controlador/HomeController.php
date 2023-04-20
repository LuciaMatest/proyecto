<?php
if (isset($_REQUEST['ver'])) {
    $_SESSION['controlador'] = $controladores['proyecto'];
    $_SESSION['pagina'] = 'Proyectos';
    $_SESSION['vista'] = $vistas['proyecto'];
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['contacto'])) {
    $_SESSION['controlador'] = $controladores['contacto'];
    $_SESSION['pagina'] = 'Contacto';
    $_SESSION['vista'] = $vistas['contacto'];
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    require_once $_SESSION['controlador'];
}
