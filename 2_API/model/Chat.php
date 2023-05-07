<?php
class Chat
{
    private $descripcion_mensaje;
    private $fecha_mensaje;
    private $id_usuario_envia;
    private $id_usuario_recibe;


    public function __construct($descripcion_mensaje, $fecha_mensaje, $id_usuario_envia, $id_usuario_recibe)
    {
        $this->descripcion_mensaje = $descripcion_mensaje;
        $this->fecha_mensaje = $fecha_mensaje;
        $this->id_usuario_envia = $id_usuario_envia;
        $this->id_usuario_recibe = $id_usuario_recibe;
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
