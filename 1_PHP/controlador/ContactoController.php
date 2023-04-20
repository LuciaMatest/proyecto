<?php
if (isset($_REQUEST['enviar'])) {

    // Validar campos
    if (empty($_SESSION['nombre']) || empty($_SESSION['email']) || empty($_SESSION['mensaje'])) {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
        header("Location: ./index.php?page=contacto");
        exit();
    }

    // Recopilar datos del formulario
    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $mensaje = $_SESSION['mensaje'];

    // Configurar correo electrónico
    $para = 'tu-correo@ejemplo.com';
    $asunto = 'Mensaje de Contacto';
    $contenido = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";

    // Enviar correo electrónico
    if (mail($para, $asunto, $contenido)) {
        echo "<script>alert('Mensaje enviado con éxito');</script>";
    } else {
        echo "<script>alert('Ha ocurrido un error al enviar el mensaje');</script>";
    }

    // Redirigir a la página de inicio
    header("Location: ./index.php");
    exit();

} elseif (isset($_REQUEST['volver'])) {

    // Definir la variable $previous_page
    $previous_page = isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : '';
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    
} else {

    // Definir la variable $previous_page
    $previous_page = isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : '';
    $_SESSION['previous_page'] = '';
}
