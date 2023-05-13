<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './webroot/PHPMailer-6.8.0/src/Exception.php';
require_once './webroot/PHPMailer-6.8.0/src/PHPMailer.php';
require_once './webroot/PHPMailer-6.8.0/src/SMTP.php';

if (isset($_REQUEST['enviarContacto'])) {


    // Recuperar los valores del formulario
    $nombre = $_POST['nombreContacto'];
    $email = $_POST['emailContacto'];
    $asunto = $_POST['asuntoContacto'];
    $mensaje = $_POST['mensajeContacto'];

    // Crear una instancia de PHPMailer; pasar `true` para habilitar excepciones
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lucia.codigoartistico@gmail.com';
        $mail->Password   = 'vyiigvrplmghgtih';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Remitente y destinatario
        $mail->setFrom('lucia.codigoartistico@gmail.com', 'Codigo Artistico');
        $mail->addAddress('lucia.codigoartistico@gmail.com', 'Codigo Artistico');

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = nl2br("Nombre: {$nombre}<br>Email: {$email}<br>Mensaje: {$mensaje}");

        $mail->send();

        // Guardar el mensaje de éxito en la sesión
        $_SESSION['success'] = "El mensaje ha sido enviado correctamente";
        $_SESSION['vista'] = $vistas['home'];
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'Home';
    } catch (Exception $e) {
        // Guardar el mensaje de error en la sesión
        $_SESSION['error'] = "No se pudo enviar el mensaje. Error del correo: {$mail->ErrorInfo}";
    }
} elseif (isset($_REQUEST['volverAtras'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} else {
    if (isset($_POST['reg-log']) && $_POST['reg-log'] == '1') {
        // El input reg-log está activo, ejecutar el código de registrarse
        if (isset($_REQUEST['registrar'])) {
            if (validarNuevoUsuario()) {
                $usuario = new Usuario(null, $_REQUEST['nombre'], $_REQUEST['telefono'], $_REQUEST['email'], sha1($_REQUEST['contraseña']), 0, null);
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

                    $_SESSION['success'] = "¡Se ha registrado correctamente!";
                } else {
                    $_SESSION['error'] = "No se ha podido registrar";
                }
            } else {
                $_SESSION['error'] = "No se ha validado, compruebe";
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
                $_SESSION['error'] = "Debe rellenar el email";
            }
            if (empty($pass)) {
                $_SESSION['error'] = "Debe rellenar la contraseña";
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

                    $_SESSION['success'] = "Inicio de sesión exitoso";
                    header('Location: ./index.php');
                }
            }
        }
    }
}
