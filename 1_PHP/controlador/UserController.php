<?php
if (isset($_REQUEST['enviarMensaje'])) {
    if (empty($_REQUEST['descripcion_mensaje']) || empty($_REQUEST['usuario_id'])) {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
        exit();
    }

    $descripcion_mensaje = $_REQUEST['descripcion_mensaje'];
    $usuario_id = $_REQUEST['usuario_id'];
    $this->addMessage($descripcion_mensaje, $usuario_id);

    // Redirigir a la página de inicio
    header("Location: ./index.php");
    exit();
} else {
    $messages = ChatDAO::findAll();
}
