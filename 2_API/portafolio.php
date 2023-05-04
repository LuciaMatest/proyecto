<?php
require_once './config/configuracion.php';

$recurso = ControladorPadre::recurso();
if($recurso) {
    if($recurso[1] == 'sensores'){
        $controlador = new sensoresController();
        $controlador->controlar();
    } else if($recurso[1] == 'actuador') {
        $controlador = new actuadorLogController();
        $controlador->controlar();
    } else if($recurso[1] == 'arduino') {
        $controlador = new arduinoController();
        $controlador->controlar();
    }
} 