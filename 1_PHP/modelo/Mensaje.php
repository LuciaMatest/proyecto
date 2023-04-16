<?php
class Mensajes{
    private $id_mensajes;
    private $descripcion_mensajes;
    private $admin_mensajes;
    private $fecha_mensajes;
    private $usuario_id;

    public function __construct($id_mensajes,$descripcion_mensajes, $admin_mensajes, $fecha_mensajes,$usuario_id){
        $this->id_mensajes = $id_mensajes;
        $this->descripcion_mensajes = $descripcion_mensajes;
        $this->admin_mensajes = $admin_mensajes;
        $this->fecha_mensajes = $fecha_mensajes;
        $this->usuario_id = $usuario_id;
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
