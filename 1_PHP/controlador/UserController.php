<?php
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['enviarMensajesUser'])) {
    $messages = ChatDAO::findAll();
    $nuevoMessage = new Chat(null, $_REQUEST['descripcion_mensaje'], date('Y-m-d'), $_REQUEST['usuario_nombre']);
    ChatDAO::insert($nuevoMessage);
} else {
    $messages = ChatDAO::findAll();
}
