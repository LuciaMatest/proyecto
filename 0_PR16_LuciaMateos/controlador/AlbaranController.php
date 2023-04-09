<?
if (isset($_REQUEST['albaran'])) {
    $albaran = AlbaranDAO::findAll();
} elseif (isset($_REQUEST['eliminar'])) {
    $_SESSION['albaran'] = $_REQUEST['id_albaran'];
    $albaran = AlbaranDAO::delete($_REQUEST['id_albaran']);
    $albaran = AlbaranDAO::findAll();
} elseif (isset($_REQUEST['editar'])) {
    $_SESSION['accion'] = 'editar';
    $_SESSION['albaran'] = $_REQUEST['id_albaran'];
    $albaran = AlbaranDAO::findById($_REQUEST['id_albaran']);
    $_SESSION['vista'] = $vistas['modificarAlbaran'];
    $_SESSION['controlador'] = $controladores['albaran'];
} elseif (isset($_REQUEST['modificar'])) {
    if (validarAlbaran()) {
        $albaran = AlbaranDAO::findById($_REQUEST['id_albaran']);
        $albaran->fecha_albaran = $_REQUEST['fecha_albaran'];
        $albaran->cantidad = $_REQUEST['cantidad'];
        $albaran->usuario_albaran = $_REQUEST['usuario_albaran'];
        if ($albaran = AlbaranDAO::update($albaran)) {
            $_SESSION['vista'] = $vistas['albaran'];
            $_SESSION['controlador'] = $controladores['albaran'];
            $producto = ProductoDAO::findAll();
            $albaran = AlbaranDAO::findAll();
        }
    } else {
        $albaran = AlbaranDAO::findById($_REQUEST['id_albaran']);
    }
} else {
    $albaran = AlbaranDAO::findAll();
}
