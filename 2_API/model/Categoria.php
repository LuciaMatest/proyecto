<?php
class Categoria
{
    private $id_categoria;
    private $nombre_categoria;

    public function __construct($nombre_categoria)
    {
        $this->nombre_categoria = $nombre_categoria;
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
