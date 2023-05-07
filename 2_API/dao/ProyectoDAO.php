<?php
class ProyectoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from proyecto;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayProyecto = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayProyecto;
    }

    public static function findById($id)
    {
        $sql = 'select * from proyecto where id_proyecto=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            return 'No existe el proyecto';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update proyecto set nombre_proyecto=?,fecha_proyecto=?,usuario_id=?,factura_id=? where id_proyecto=?;';
        $datos = array(
            $objeto->nombre_proyecto,
            $objeto->fecha_proyecto,
            $objeto->usuario_id,
            $objeto->factura_id,
            $objeto->id_proyecto
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
        $inserta = 'insert into proyecto values (?,?,?,?)';
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
        $elimina = 'delete from proyecto where id_proyecto=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
