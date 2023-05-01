<?php
if (isset($_REQUEST['nuevoProyecto'])) {
    $_SESSION['controlador'] = $controladores['nuevo'];
    $_SESSION['pagina'] = 'Nuevo';
    $_SESSION['vista'] = $vistas['nuevo'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['nuevoProyecto'])) {
    $_SESSION['controlador'] = $controladores['nuevo'];
    $_SESSION['pagina'] = 'Nuevo';
    $_SESSION['vista'] = $vistas['nuevo'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['editarPerfil'])) {
    $_SESSION['accion'] = 'editar';
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
} elseif (isset($_REQUEST['guardarCambios'])) {
    if (validarUsuario()) {
        $_SESSION['accion'] = 'editar';
        $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
        $usuario->nombre_usuario = $_REQUEST['nombre'];
        $usuario->telefono_usuario = $_REQUEST['telefono'];
        $usuario->email_usuario = $_REQUEST['email'];
        $usuario->contrasena_usuario = $_REQUEST['contraseña'];
        $usuario->id_usuario = $_REQUEST['id_usuario'];

        $usuario = UsuarioDAO::update($usuario);
        $_SESSION['nombre_usuario'] = $_REQUEST['nombre'];
        $_SESSION['telefono_usuario'] = $_REQUEST['telefono'];
        $_SESSION['email_usuario'] = $_REQUEST['email'];
        $_SESSION['contrasena_usuario'] = $_REQUEST['contraseña'];
        $_SESSION['id_usuario'] = $_REQUEST['id_usuario'];


        $_SESSION['vista'] = $vistas['admin'];
        $_SESSION['controlador'] = $controladores['admin'];
    }
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
} else {
    $array_proyectos = ProyectoDAO::findAll();
    $array_usuarios = UsuarioDAO::findAll();
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
    $messages = ChatDAO::findAll();
}
