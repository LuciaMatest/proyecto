<?php
class Producto
{
    private $id_producto;
    private $nombre_producto;
    private $descripcion_producto;
    private $imagen_producto;
    private $precio;
    private $cantidad;
    private $categoria_id;
    private $proyecto_id;

    public function __construct($nombre_producto, $descripcion_producto, $imagen_producto, $precio, $cantidad, $categoria_id, $proyecto_id)
    {
        $this->nombre_producto = $nombre_producto;
        $this->descripcion_producto = $descripcion_producto;
        $this->imagen_producto = $imagen_producto;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->categoria_id = $categoria_id;
        $this->proyecto_id = $proyecto_id;
    }

    public function __get($get)
    {
        //Si la propiedad no existiera retornaría null
        if (property_exists(__CLASS__, $get)) {
            return $this->$get;
        }
        return null;
    }

    public function __set($set, $valor)
    {
        if (property_exists(__CLASS__, $set)) {
            return $this->$set = $valor;
        }
    }
}
