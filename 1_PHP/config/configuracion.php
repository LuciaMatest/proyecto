<?php
//Base de datos
require_once('./config/conexion.php');

//Controladores
$controladores = array(
    'home' => './controlador/HomeController.php',
    'contacto' => './controlador/ContactoController.php',
    'proyecto' => './controlador/ProyectoController.php',
    'producto' => './controlador/ProductoController.php',
    'admin' => './controlador/AdminController.php',
    'user' => './controlador/UserController.php'
);

//Modelo
require_once('./modelo/Archivo.php');
require_once('./modelo/Categoria.php');
require_once('./modelo/Factura.php');
require_once('./modelo/Mensaje.php');
require_once('./modelo/Producto.php');
require_once('./modelo/Proyecto.php');
require_once('./modelo/Usuario.php');
require_once('./modelo/Chat.php');

//Vista
$vistas = array(
    'layout' => './vista/layoutView.php',
    'home' => './vista/homeView.php',
    'contacto' => './vista/contactoView.php',
    'proyecto' => './vista/proyectoView.php',
    'producto' => './vista/productoView.php',
    'admin' => './vista/adminView.php',
    'user' => './vista/userView.php'
);

//Core
require_once('./core/funciones.php');

//Dao
require_once('./dao/DAO.php');
require_once('./dao/FactoryBD.php');
require_once('./dao/UsuarioDAO.php');
require_once('./dao/CategoriaDAO.php');
require_once('./dao/ProductoDAO.php');
require_once('./dao/ChatDAO.php');
