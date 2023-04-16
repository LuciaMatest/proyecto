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
        } elseif (isset($_REQUEST['proyecto'])) {
            $_SESSION['controlador'] = $controladores['proyecto'];
            $_SESSION['vista'] = $vistas['proyecto'];
            $_SESSION['pagina'] = 'Proyectos';
            require_once($_SESSION['controlador']);
        } elseif (isset($_REQUEST['producto'])) {
            $_SESSION['controlador'] = $controladores['producto'];
            $_SESSION['vista'] = $vistas['producto'];
            $_SESSION['pagina'] = 'Producto';
            require_once($_SESSION['controlador']);
        } else {
            require_once($_SESSION['controlador']);
        }
    }
}
require_once('./vista/layout.php');
