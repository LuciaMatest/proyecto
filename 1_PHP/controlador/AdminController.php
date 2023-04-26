<?php
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['enviarMensajesAdmin'])) {
    $messages = ChatDAO::findAll();
    $nuevoMessage = new Chat(null, $_REQUEST['descripcion_mensaje'], date('Y-m-d'), $_REQUEST['usuario_id']);
    ChatDAO::insert($nuevoMessage);
} else {
    $messages = ChatDAO::findAll();
}
