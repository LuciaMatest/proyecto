<?php
class Factura
{
    private $id_factura;
    private $nombre_factura;
    private $fecha_pago;
    private $fecha_factura;
    private $estado;
    private $proyecto_id;
    private $detalles_id;

    public function __construct($id_factura, $nombre_factura, $fecha_pago, $fecha_factura, $estado, $proyecto_id, $detalles_id)
    {
        $this->id_factura = $id_factura;
        $this->nombre_factura = $nombre_factura;
        $this->fecha_pago = $fecha_pago;
        $this->fecha_factura = $fecha_factura;
        $this->estado = $estado;
        $this->proyecto_id = $proyecto_id;
        $this->detalles_id = $detalles_id;
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
