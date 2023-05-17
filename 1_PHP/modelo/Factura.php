<?php
class Factura
{
    private $id_factura;
    private $nombre_factura;
    private $fecha_pago;
    private $fecha_factura;
    private $estado;

    public function __construct($nombre_factura, $fecha_pago, $fecha_factura, $estado)
    {
        $this->nombre_factura = $nombre_factura;
        $this->fecha_pago = $fecha_pago;
        $this->fecha_factura = $fecha_factura;
        $this->estado = $estado;
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
