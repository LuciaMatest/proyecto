<?php
if (isset($_REQUEST['volver'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'Home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} else {
    $array_categorias = CategoriaDAO::findAll();
    $array_productos = ProductoDAO::findByCate($_REQUEST['categoria_id']);
}
