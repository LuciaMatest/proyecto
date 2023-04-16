<?php
if (isset($_REQUEST['ver'])) {
    $_SESSION['controlador'] = $controladores['proyecto'];
    $_SESSION['pagina'] = 'Proyectos';
    $_SESSION['vista'] = $vistas['proyecto'];
    require_once $_SESSION['controlador'];
} 