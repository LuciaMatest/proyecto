<?php
if (isset($_REQUEST['nuevoProyecto'])) {
    $_SESSION['controlador'] = $controladores['nuevo'];
    $_SESSION['pagina'] = 'Nuevo';
    $_SESSION['vista'] = $vistas['nuevo'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} else {
    $messages = ChatDAO::findAll();
}
