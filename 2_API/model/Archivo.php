<?php
class Archivo
{
    private $nombre_archivo;
    private $url_archivo;
    private $descripcion_archivo;
    private $proyecto_id;

    public function __construct($nombre_archivo, $url_archivo, $descripcion_archivo, $proyecto_id)
    {
        $this->nombre_archivo = $nombre_archivo;
        $this->url_archivo = $url_archivo;
        $this->descripcion_archivo = $descripcion_archivo;
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
