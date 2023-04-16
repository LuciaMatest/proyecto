<?php
if (isset($_REQUEST['producto'])) {
    $_SESSION['controlador'] = $controladores['producto'];
    $_SESSION['pagina'] = 'Producto';
    $_SESSION['vista'] = $vistas['producto'];
    require_once $_SESSION['controlador'];
} else {
    $array_categorias = CategoriaDAO::findAll();
    $array_productos = ProductoDAO::findAll();
}
