<?php
class Proyecto
{
    private $id_proyecto;
    private $nombre_proyecto;
    private $fecha_proyecto;
    private $usuario_id;
    private $factura_id;


    public function __construct($id_proyecto, $nombre_proyecto, $fecha_proyecto, $usuario_id, $factura_id)
    {
        $this->id_proyecto = $id_proyecto;
        $this->nombre_proyecto = $nombre_proyecto;
        $this->fecha_proyecto = $fecha_proyecto;
        $this->usuario_id = $usuario_id;
        $this->factura_id = $factura_id;
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
