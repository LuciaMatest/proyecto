<?php
if (isset($_POST['enviarMensajesUser'])) {
    $nuevoMessage = new Chat(null, $_POST['descripcion_mensaje'], date('Y-m-d'), $_POST['usuario_id']);
    ChatDAO::insert($nuevoMessage);
} else {
    $messages = ChatDAO::findAll();
}
