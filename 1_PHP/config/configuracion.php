<?php
//Base de datos
require_once('./config/conexion.php');

//Controladores
$controladores = array(
    'home' => './controlador/HomeController.php',
    'contacto' => './controlador/ContactoController.php',
    'proyectos' => './controlador/ProyectosController.php',
);

//Modelo
require_once('./modelo/Archivo.php');
require_once('./modelo/Categoria.php');
require_once('./modelo/Detalles.php');
require_once('./modelo/Factura.php');
require_once('./modelo/Mensajes.php');
require_once('./modelo/Producto.php');
require_once('./modelo/Proyecto.php');
require_once('./modelo/Usuario.php');

//Vista
$vistas = array(
    'layout' => './vista/layoutView.php',
    'home' => './vista/homeView.php',
    'contacto' => './vista/contactoView.php',
    'proyectos' => './vista/proyectosView.php',
);

//Core
require_once('./core/funciones.php');

//Dao
require_once('./dao/DAO.php');
require_once('./dao/FactoryBD.php');
require_once('./dao/UsuarioDAO.php');