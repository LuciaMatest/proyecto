<?php
// conexion
require_once './config/conexion.php';

// Controladores
require_once './controller/controladorPadre.php';
require_once './controller/ArchivoControlador.php';
require_once './controller/CategoriaControlador.php';
require_once './controller/ChatControlador.php';
require_once './controller/FacturaControlador.php';
require_once './controller/ProductoControlador.php';
require_once './controller/ProyectoControlador.php';
require_once './controller/UsuarioControlador.php';


// DAO
require_once './dao/DAO.php';
require_once './dao/FactoryBD.php';
require_once './dao/ArchivoDAO.php';
require_once './dao/CategoriaDAO.php';
require_once './dao/ChatDAO.php';
require_once './dao/FacturaDAO.php';
require_once './dao/ProductoDAO.php';
require_once './dao/ProyectoDAO.php';
require_once './dao/UsuarioDAO.php';

// Model
require_once './modelo/Archivo.php';
require_once './modelo/Categoria.php';
require_once './modelo/Factura.php';
require_once './modelo/Producto.php';
require_once './modelo/Proyecto.php';
require_once './modelo/Usuario.php';
require_once './modelo/Chat.php';
