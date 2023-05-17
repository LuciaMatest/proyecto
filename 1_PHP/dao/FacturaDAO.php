<?php
class FacturaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from factura;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayFactura = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayFactura;
    }

    public static function findById($id)
    {
        $sql = 'select * from factura where id_factura=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el factura</span>';
        }
    }

    public static function findByFecha($fecha)
    {
        $sql = 'select * from factura where fecha_factura=?;';
        $datos = array($fecha);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el factura</span>';
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
        $objeto = (array)$objeto;
        $datos = array();
        foreach ($objeto as $att) {
            array_push($datos, $att);
        }
        $devuelve = parent::ejecuta($inserta, $datos);
        if ($devuelve->rowCount() == 0) {
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
