<?php
class Producto{
    private $id_producto;
    private $nombre_producto;
    private $descripcion_producto;
    private $imagen_producto;
    private $categoria_id;

    public function __construct($id_producto,$nombre_producto, $descripcion_producto, $imagen_producto,$categoria_id){
        $this->id_producto = $id_producto;
        $this->nombre_producto = $nombre_producto;
        $this->descripcion_producto = $descripcion_producto;
        $this->imagen_producto = $imagen_producto;
        $this->categoria_id = $categoria_id;
    }

    public function __get($get){
        //Si la propiedad no existiera retornaría null
        if (property_exists(__CLASS__,$get)) {
            return $this->$get;
        }
        return null;
    }

    public function __set($set,$valor){
        if (property_exists(__CLASS__,$set)) {
            return $this->$set=$valor;
        }
    }
}
