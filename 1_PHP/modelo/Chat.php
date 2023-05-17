<?php
class Chat
{
    private $id_mensaje;
    private $descripcion_mensaje;
    private $fecha_mensaje;
    private $usuario_id;
    private $admin_d;


    public function __construct($descripcion_mensaje, $fecha_mensaje, $usuario_id, $admin_d)
    {
        $this->descripcion_mensaje = $descripcion_mensaje;
        $this->fecha_mensaje = $fecha_mensaje;
        $this->usuario_id = $usuario_id;
        $this->admin_d = $admin_d;
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
