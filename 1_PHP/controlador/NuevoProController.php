<?php
if (isset($_REQUEST['volverNuevo'])) {
    $_SESSION['controlador'] = $controladores['admin'];
    $_SESSION['pagina'] = 'Admin';
    $_SESSION['vista'] = $vistas['admin'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['nuevoProducto'])) {
    $producto = new Producto(null, $_REQUEST['nombre_producto'], $_REQUEST['descripcion_producto'],  $_FILES['imagen_producto']['name'], (float)$_REQUEST['precio'], $_REQUEST['cantidad'], $_REQUEST['categoria_id'], $_REQUEST['proyecto_id']);
    if ($producto = ProductoDAO::insert($producto)) {
        $_SESSION['vista'] = $vistas['admin'];
        $_SESSION['controlador'] = $controladores['admin'];
        $array_productos = ProductoDAO::findAll();
    }
} elseif (isset($_REQUEST['nuevoProyecto'])) {
    $proyecto = new Proyecto(null, $_REQUEST['nombre_proyecto'], $_REQUEST['fecha_proyecto'], $_REQUEST['usuario_id'], $_REQUEST['factura_id']);
    if ($proyecto = ProyectoDAO::insert($proyecto)) {
        $_SESSION['vista'] = $vistas['admin'];
        $_SESSION['controlador'] = $controladores['admin'];
        $array_proyectos = ProyectoDAO::findAll();
    }
}
