<?php
if (isset($_REQUEST['enviarMensajesAdmin'])) {
    $messages = ChatDAO::findAll();
    $nuevoMessage = new Chat(null, $_REQUEST['descripcion_mensaje'], date('Y-m-d'), $_REQUEST['usuario_nombre']);
    ChatDAO::insert($nuevoMessage);
} else {
    $messages = ChatDAO::findAll();
}
