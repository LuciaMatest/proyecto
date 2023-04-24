<?
require_once './controller/ControladorPadre.php';
require_once './controller/ProductosControlador.php';
require_once './model/Producto.php';
require_once './dao/ProductoDAO.php';

$recurso = ControladorPadre::recurso();

if ($recurso) {
    if ($recurso[1] == 'producto') {
        $controlador = new ProductosControlador();
        $controlador->controlar();
    } elseif ($recurso[1] == 'proyecto') {
        $controlador = new ProductosControlador();
        $controlador->controlar();
    } elseif ($recurso[1] == 'archivos') {
        $controlador = new ProductosControlador();
        $controlador->controlar();
    } elseif ($recurso[1] == 'producto') {
        $controlador = new ProductosControlador();
        $controlador->controlar();
    }
}
