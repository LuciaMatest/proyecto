<?php
if (isset($_REQUEST['registrar'])) {
    if (validarNuevoUsuario()) {
        $usuario = new Usuario(null, $_REQUEST['nombre_usuario'], $_REQUEST['telefono_usuario'], $_REQUEST['email_usuario'], sha1($_REQUEST['contrasena_usuario']), 0, null);

        if (UsuarioDAO::insert($usuario)) {
            $_SESSION['controlador'] = $controladores['home'];
            $_SESSION['vista'] = $vistas['home'];
            $_SESSION['validado'] = true;
            $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
            $_SESSION['telefono_usuario'] = $usuario->telefono_usuario;
            $_SESSION['email_usuario'] = $usuario->email_usuario;
            $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No se ha podido registrar </span>';
        }
    } else {
        $_SESSION['error'] = '<span style="color:brown"> No se ha validado, compruebe </span>';
    }
} else {
    if (isset($_REQUEST['user'])) {
        $email = $_REQUEST['email_usuario'];
        $pass = $_REQUEST['contrasena_usuario'];

        if (empty($email)) {
            $_SESSION['error'] = '<span style="color:brown"> Debe rellenar el email</span>';
        }
        if (empty($pass)) {
            $_SESSION['error'] = '<span style="color:brown"> Debe rellenar la contraseña</span>';
        } else {
            $usuario = UsuarioDAO::valida($email, $pass);
            if ($usuario != null) {
                $_SESSION['validado'] = true;
                $_SESSION['email_usuario'] = $email;
                $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
                $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
                $_SESSION['vista'] = $vistas['home'];
                $_SESSION['controlador'] = $controladores['home'];
                header('Location: ./index.php');
            }
        }
    }
}
