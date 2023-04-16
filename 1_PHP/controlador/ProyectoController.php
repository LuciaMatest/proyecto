<?php
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['producto'])) {
    $_SESSION['controlador'] = $controladores['producto'];
    $_SESSION['pagina'] = 'Producto';
    $_SESSION['vista'] = $vistas['producto'];
    require_once $_SESSION['controlador'];
} else {
    $array_categorias = CategoriaDAO::findAll();
    $array_productos = ProductoDAO::findAll();
}
