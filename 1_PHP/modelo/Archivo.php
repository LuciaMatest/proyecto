<?php
class Archivo{
    private $id_archivo;
    private $nombre_archivo;
    private $url_archivo;
    private $descripcion_archivo;

    public function __construct($id_archivo,$nombre_archivo, $url_archivo, $descripcion_archivo){
        $this->id_archivo = $id_archivo;
        $this->nombre_archivo = $nombre_archivo;
        $this->url_archivo = $url_archivo;
        $this->descripcion_archivo = $descripcion_archivo;
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
