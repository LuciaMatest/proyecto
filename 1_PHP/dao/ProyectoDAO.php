<?php
class ProyectoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from proyecto;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayProyecto = array();
        while ($objeto = $resultado->fetchObject()) {
            $proyecto = new Proyecto(
                $objeto->id_proyecto,
                $objeto->nombre_proyecto,
                $objeto->fecha_proyecto,
                $objeto->usuario_id,
                $objeto->factura_id
            );
            array_push($arrayProyecto, $objeto);
        }
        return $arrayProyecto;
    }

    public static function findById($id)
    {
        $sql = 'select * from proyecto where id_proyecto=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $proyecto = new Proyecto(
                $objeto->id_proyecto,
                $objeto->nombre_proyecto,
                $objeto->fecha_proyecto,
                $objeto->usuario_id,
                $objeto->factura_id
            );
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
        $inserta = 'insert into proyecto values (null,?,current_date,?,?)';
        $datos = array(
            $objeto->nombre_proyecto,
            $objeto->usuario_id,
            $objeto->factura_id
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
