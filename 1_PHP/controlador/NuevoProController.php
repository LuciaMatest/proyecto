<?php
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['proyecto'];
    $_SESSION['pagina'] = 'Proyecto';
    $_SESSION['vista'] = $vistas['proyecto'];
    require_once $_SESSION['controlador'];
}
