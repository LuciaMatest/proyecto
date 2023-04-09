<?php
class Detalles{
    private $id_detalles;
    private $descripcion_detalles;
    private $precio;
    private $IVA;
    private $cantidad;

    public function __construct($id_detalles,$descripcion_detalles, $precio, $IVA,$cantidad){
        $this->id_detalles = $id_detalles;
        $this->descripcion_detalles = $descripcion_detalles;
        $this->precio = $precio;
        $this->IVA = $IVA;
        $this->cantidad = $cantidad;
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
