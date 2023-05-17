<?php
class FacturaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from factura;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayFactura = array();
        while ($objeto = $resultado->fetchObject()) {
            $factura = new Factura(
                $objeto->id_factura,
                $objeto->nombre_factura,
                $objeto->fecha_pago,
                $objeto->fecha_factura,
                $objeto->estado
            );
            array_push($arrayFactura, $factura);
        }
        return $arrayFactura;
    }

    public static function findById($id)
    {
        $sql = 'select * from factura where id_factura=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $factura = new Factura(
                $objeto->id_factura,
                $objeto->nombre_factura,
                $objeto->fecha_pago,
                $objeto->fecha_factura,
                $objeto->estado
            );
        } else {
            $_SESSION['error'] = 'No existe el factura';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update factura set nombre_factura=?,fecha_pago=?,fecha_factura=?,estado=? where id_factura=?;';
        $datos = array(
            $objeto->nombre_factura,
            $objeto->fecha_pago,
            $objeto->fecha_factura,
            $objeto->estado,
            $objeto->id_factura
        );
        $resultado = parent::ejecuta($actualiza, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function insert($objeto)
    {
        $inserta = "insert into factura (nombre_factura, fecha_pago, fecha_factura, estado) values (?,?,?,?)";
        $datos = array(
            $objeto->nombre_factura,
            $objeto->fecha_pago,
            $objeto->fecha_factura,
            $objeto->estado
        );
        $resultado = parent::ejecuta($inserta, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }


    public static function delete($id)
    {
        $elimina = 'delete from factura where id_factura=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
