<?php
if (isset($_REQUEST['nuevoProyecto'])) {
    $_SESSION['controlador'] = $controladores['nuevo'];
    $_SESSION['pagina'] = 'Nuevo';
    $_SESSION['vista'] = $vistas['nuevo'];
    require_once $_SESSION['controlador'];

} elseif (isset($_REQUEST['verFacturaAdmin'])) {
    $_SESSION['id_factura'] = $_REQUEST['factura_id'];
    $_SESSION['id_proyecto'] = $_REQUEST['id_proyecto'];
    $proyecto = ProyectoDAO::findById($_REQUEST['id_proyecto']);
    $_SESSION['controlador'] = $controladores['factura'];
    $_SESSION['pagina'] = 'Facturas';
    $_SESSION['vista'] = $vistas['factura'];
    require_once $_SESSION['controlador'];

} elseif (isset($_REQUEST['volverAdmin'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];

} elseif (isset($_REQUEST['borrarUsuario'])) {
    $_SESSION['id_usuario'] = $_REQUEST['id_usuario'];
    $usuario = UsuarioDAO::findById($_REQUEST['id_usuario']);
    $usuarioBorrado = UsuarioDAO::borradoLogic($usuario);
    if ($usuarioBorrado) {
        $_SESSION['success'] = 'El usuario se ha borrado correctamente';
        $array_usuarios = UsuarioDAO::findUserActive();
    } else {
        $_SESSION['error'] = 'No se ha podido borrar el usuario seleccionado, compruebe';
    }

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

} elseif (isset($_REQUEST['editarUsuario'])) {
    $id_otrousuario = $_REQUEST['editarUsuario'];
    $otrousuario = UsuarioDAO::findById($id_otrousuario);

} elseif (isset($_REQUEST['guardarUsuario'])) {
    $contrasenaUser = $_REQUEST['contraseñaUser'];
    $contrasena2User = $_REQUEST['contraseña2User'];
    if ($contrasenaUser === $contrasena2User) {
        $id_otrousuario = $_REQUEST['guardarUsuario'];
        $otrousuario = UsuarioDAO::findById($id_otrousuario);
        $otrousuario->nombre_usuario = $_REQUEST['nombreUser'];
        $otrousuario->telefono_usuario = $_REQUEST['telefonoUser'];
        $otrousuario->email_usuario = $_REQUEST['emailUser'];
        $otrousuario->contrasena_usuario = sha1($_REQUEST['contraseñaUser']);

        if (!UsuarioDAO::update($otrousuario)) {
            $_SESSION['error'] = 'Debe rellenar todos los campos para que se pueda modificar el perfil';
        } else {
            $_SESSION['nombre_usuario'] = $_REQUEST['nombreUser'];
            $_SESSION['telefono_usuario'] = $_REQUEST['telefonoUser'];
            $_SESSION['email_usuario'] = $_REQUEST['emailUser'];

            $_SESSION['success'] = 'Perfil del usuario actualizado!';
            $_SESSION['vista'] = $vistas['admin'];
            $_SESSION['controlador'] = $controladores['admin'];
        }
    } else {
        // Mostrar un mensaje de error si las contraseñas no coinciden
        $_SESSION['error'] = 'Las contraseñas no coinciden';
    }

} else {
    $array_proyectos = ProyectoDAO::findAll();
    $array_productos = ProductoDAO::findAll();
    $array_usuarios = UsuarioDAO::findUserActive();
    $array_mensajes = ChatDAO::findAll();
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
}
