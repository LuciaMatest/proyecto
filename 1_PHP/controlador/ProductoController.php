<?
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['proyecto'];
    $_SESSION['pagina'] = 'Proyecto';
    $_SESSION['vista'] = $vistas['proyecto'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['contacto'])) {
    $_SESSION['controlador'] = $controladores['contacto'];
    $_SESSION['pagina'] = 'Contacto';
    $_SESSION['vista'] = $vistas['contacto'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['privada'])) {
    if (esAdmin()) {
        $_SESSION['controlador'] = $controladores['admin'];
        $_SESSION['pagina'] = 'Área privada - Admin';
        $_SESSION['vista'] = $vistas['admin'];
        require_once $_SESSION['controlador'];
    } else {
        $_SESSION['controlador'] = $controladores['user'];
        $_SESSION['pagina'] = 'Área privada - Usuario';
        $_SESSION['vista'] = $vistas['user'];
        require_once $_SESSION['controlador'];
    }
}
