<?php
if (isset($_REQUEST['ver'])) {
    $_SESSION['controlador'] = $controladores['proyecto'];
    $_SESSION['pagina'] = 'Proyectos';
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
} else {
    if (isset($_POST['reg-log']) && $_POST['reg-log'] == '1') {
        // El input reg-log está activo, ejecutar el código de registrarse
        if (isset($_REQUEST['registrar'])) {
            if (validarNuevoUsuario()) {
                $usuario = new Usuario(null, $_REQUEST['nombre'], $_REQUEST['telefono'], $_REQUEST['email'], $_REQUEST['contraseña'], 0, null);

                if (UsuarioDAO::insert($usuario)) {
                    $_SESSION['controlador'] = $controladores['home'];
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['validado'] = true;
                    $_SESSION['nombre'] = $usuario->nombre_usuario;
                    $_SESSION['telefono'] = $usuario->telefono_usuario;
                    $_SESSION['email'] = $usuario->email_usuario;
                    $_SESSION['contraseña'] = $usuario->contrasena_usuario;
                } else {
                    $_SESSION['error'] = '<span style="color:brown"> No se ha podido registrar </span>';
                }
            } else {
                $_SESSION['error'] = '<span style="color:brown"> No se ha validado, compruebe </span>';
            }
        }
    } else {
        // El input reg-log no está activo, ejecutar el código de login
        if (isset($_REQUEST['email_usuario'])) {
            $email = $_REQUEST['email_usuario'];
            $pass = $_REQUEST['contrasena_usuario'];
            if (empty($email)) {
                $_SESSION['error'] = 'Debe rellenar el email';
            }
            if (empty($pass)) {
                $_SESSION['error'] = 'Debe rellenar la contraseña';
            } else {
                $usuario = UsuarioDAO::valida($email, $pass);
                if ($usuario != null) {
                    $_SESSION['validado'] = true;
                    $_SESSION['email_usuario'] = $email;
                    $_SESSION['id_usuario'] = $usuario->id_usuario;
                    $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
                    $_SESSION['telefono_usuario'] = $usuario->telefono_usuario;
                    $_SESSION['borrado_usuario'] = $usuario->borrado_usuario;
                    $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['controlador'] = $controladores['home'];
                    header('Location: ./index.php');
                }
            }
        }
    }
}
