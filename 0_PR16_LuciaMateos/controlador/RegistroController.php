<?php
if (isset($_REQUEST['registrar'])) {
    if (validarNuevoUsuario()) {  
        $usuario = new Usuario($_REQUEST['user'], sha1($_REQUEST['contraseña']), $_REQUEST['nombre'], $_REQUEST['email'], $_REQUEST['fecha'], $_REQUEST['rol']);
    
        if (UsuarioDAO::insert($usuario)) {
            $_SESSION['controlador'] = $controladores['home'];
            $_SESSION['vista'] = $vistas['home'];
            $_SESSION['validado'] = true;
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['rol'] = $usuario->rol;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No se ha podido registrar </span>';
        }
    } else {
        $_SESSION['error'] = '<span style="color:brown"> No se ha validado, compruebe </span>';
    }

}
