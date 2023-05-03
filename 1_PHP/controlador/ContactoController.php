<?php
if (isset($_REQUEST['enviarContacto'])) {
    if (isset($_POST['nombreContacto']) && isset($_POST['telefonoContacto']) && isset($_POST['emailContacto']) && isset($_POST['mensajeContacto'])) {
        $nombre = $_POST['nombreContacto'];
        $telefono = $_POST['telefonoContacto'];
        $email = $_POST['emailContacto'];
        $mensaje = $_POST['mensajeContacto'];
    
        $to = "lucia.codigoartistico@gmail.com";
        $subject = "Mensaje de formulario de contacto";
        $body = "Nombre: " . $nombre . "\nTeléfono:" .$telefono. "\nCorreo electrónico: " . $email . "\nMensaje:\n" . $mensaje;
        $headers = "From: " . $email;
    
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado";
        } else {
            echo "Error al enviar el mensaje";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario";
    }
} elseif (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} else {
    if (isset($_POST['reg-log']) && $_POST['reg-log'] == '1') {
        // El input reg-log está activo, ejecutar el código de registrarse
        if (isset($_REQUEST['registrar'])) {
            if (validarNuevoUsuario()) {
                $usuario = new Usuario(null, $_REQUEST['nombre'], $_REQUEST['telefono'], $_REQUEST['email'], $_REQUEST['contraseña'], 0, null);
                if (UsuarioDAO::insert($usuario)) {
                    $usuario = UsuarioDAO::valida($_REQUEST['email'], $_REQUEST['contraseña']);
                    $_SESSION['controlador'] = $controladores['home'];
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['validado'] = true;
                    $_SESSION['id_usuario'] = $usuario->id_usuario;
                    $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
                    $_SESSION['telefono_usuario'] = $usuario->telefono_usuario;
                    $_SESSION['borrado_usuario'] = $usuario->borrado_usuario;
                    $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
                    $_SESSION['email_usuario'] = $usuario->email_usuario;

                    $_SESSION['success'] = '¡Se ha registrado correctamente!';
                } else {
                    $_SESSION['error'] = '<script>alert("No se ha podido registrar");</script>';
                }
            } else {
                $_SESSION['error'] = '<script>alert("No se ha validado, compruebe");</script>';
            }
        }
    } else {
        // El input reg-log no está activo, ejecutar el código de login
        if (isset($_REQUEST['email_usuario'])) {
            $email = $_REQUEST['email_usuario'];
            $pass = $_REQUEST['contrasena_usuario'];

            //Recuerdame
            if (isset($_REQUEST["recuerdame"])) {
                setcookie("email_usuario", $email);
                setcookie("recuerdame", $email);
            } else {
                // Si no queremos seguir recordando
                setcookie("email_usuario", $email, time() - 1);
                setcookie("recuerdame", $email, time() - 1);
            }

            if (empty($email)) {
                $_SESSION['error'] = '<script>alert("Debe rellenar el email");</script>';
            }
            if (empty($pass)) {
                $_SESSION['error'] = '<script>alert("Debe rellenar la contraseña");</script>';
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
