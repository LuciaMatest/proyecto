<?php
if (isset($_REQUEST['ver'])) {
    $_SESSION['controlador'] = $controladores['proyectos'];
    $_SESSION['pagina'] = 'Proyectos';
    $_SESSION['vista'] = $vistas['proyectos'];
    require_once $_SESSION['controlador'];
} 