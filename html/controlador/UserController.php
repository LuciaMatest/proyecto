<?php
if (isset($_REQUEST['volverUser'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['verFacturaUser'])) {
    $_SESSION['id_factura'] = $_REQUEST['factura_id'];
    $_SESSION['id_proyecto'] = $_REQUEST['id_proyecto'];
    $proyecto = ProyectoDAO::findById($_REQUEST['id_proyecto']);
    $_SESSION['controlador'] = $controladores['factura'];
    $_SESSION['pagina'] = 'Facturas';
    $_SESSION['vista'] = $vistas['factura'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['editarPerfil'])) {
    $_SESSION['accion'] = 'editar';
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
} elseif (isset($_REQUEST['guardarCambios'])) {
    $contrasena = $_REQUEST['contraseña'];
    $contrasena2 = $_REQUEST['contraseña2'];
    if ($contrasena === $contrasena2) {
        $_SESSION['accion'] = 'editar';
        $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
        $usuario->nombre_usuario = $_REQUEST['nombre'];
        $usuario->telefono_usuario = $_REQUEST['telefono'];
        $usuario->email_usuario = $_REQUEST['email'];
        $usuario->contrasena_usuario = sha1($_REQUEST['contraseña']);

        if (!UsuarioDAO::update($usuario)) {
            $_SESSION['error'] = 'Debe rellenar todos los campos para que se pueda modificar el perfil';
        } else {
            $_SESSION['nombre_usuario'] = $_REQUEST['nombre'];
            $_SESSION['telefono_usuario'] = $_REQUEST['telefono'];
            $_SESSION['email_usuario'] = $_REQUEST['email'];

            $_SESSION['success'] = 'Perfil actualizado!';
            $_SESSION['vista'] = $vistas['admin'];
            $_SESSION['controlador'] = $controladores['admin'];
        }
    } else {
        // Mostrar un mensaje de error si las contraseñas no coinciden
        $_SESSION['error'] = 'Las contraseñas no coinciden';
    }
} else {
    $array_proyectos = ProyectoDAO::findAll();
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
}
