<?php
class Imagen
{
    private $id_imagen;
    private $url_imagen;

    public function __construct($id_imagen, $url_imagen)
    {
        $this->id_imagen = $id_imagen;
        $this->url_imagen = $url_imagen;
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
