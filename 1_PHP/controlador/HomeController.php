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
} elseif (isset($_REQUEST['login'])) {
    if (isset($_REQUEST['user'])) {
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        if (empty($user)) {
            $_SESSION['error'] = 'Debe rellenar el nombre';
        }
        if (empty($pass)) {
            $_SESSION['error'] = 'Debe rellenar la contraseña';
        } else {
            $usuario = UsuarioDAO::valida($user, $pass);
            if ($usuario != null) {
                $_SESSION['validado'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['nombre'] = $usuario->nombre;
                $_SESSION['roles'] = $usuario->roles;
                $_SESSION['vista'] = $vistas['home'];
                $_SESSION['controlador'] = $controladores['home'];
                header('Location: ./index.php');
            }
        }
    }
}
