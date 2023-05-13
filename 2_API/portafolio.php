<?php
require_once './config/configuracion.php';

$recurso = ControladorPadre::recurso();
if ($recurso) {
    if ($recurso[1] == 'imagen') {
        $controlador = new ImagenControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'categoria') {
        $controlador = new CategoriaControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'chat') {
        $controlador = new ChatControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'factura') {
        $controlador = new FacturaControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'producto') {
        $controlador = new ProductoControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'proyecto') {
        $controlador = new ProyectoControlador();
        $controlador->controlar();
    } else if ($recurso[1] == 'usuario') {
        $controlador = new UsuarioControlador();
        $controlador->controlar();
    }
}
