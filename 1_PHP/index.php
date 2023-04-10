<?
require_once('./config/configuracion.php');
session_start();

if (isset($_REQUEST['home'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    $_SESSION['pagina'] = 'Home';
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['logout'])) {
    session_destroy();
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    $_SESSION['pagina'] = 'Home';
    header('Location: index.php');
} else {
    if (!isset($_SESSION['pagina'])) {
        //si no tiene una vista home
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'Home';
        $_SESSION['vista'] = $vistas['home'];
        require_once($_SESSION['controlador']);
    } elseif (isset($_SESSION['pagina'])) {
        if (isset($_REQUEST['contacto'])) {
            $_SESSION['controlador'] = $controladores['contacto'];
            $_SESSION['vista'] = $vistas['contacto'];
            $_SESSION['pagina'] = 'Contacto';
            require_once($_SESSION['controlador']);
        } elseif (isset($_REQUEST['proyectos'])) {
            $_SESSION['controlador'] = $controladores['proyectos'];
            $_SESSION['vista'] = $vistas['proyectos'];
            $_SESSION['pagina'] = 'Proyectos';
            require_once($_SESSION['controlador']);
        } else {
            require_once($_SESSION['controlador']);
        }
    }
}
require_once('./vista/layout.php');