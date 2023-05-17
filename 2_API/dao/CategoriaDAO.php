<?php
class CategoriaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from categoria;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayCategoria = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayCategoria;
    }

    public static function findById($id)
    {
        $sql = 'select * from categoria where id_categoria=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = 'No existe el categoria';
        }
    }

    public static function findByName($nombre)
    {
        $sql = 'select * from categoria where nombre_categoria = ?;';
        $datos = array($nombre);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = 'No existe el categoria';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update categoria set nombre_categoria=? where id_categoria=?;';
        $datos = array(
            $objeto->id_categoria,
            $objeto->nombre_categoria
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
        $inserta = 'insert into categoria (nombre_categoria) values (?)';
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
        $elimina = 'delete from categoria where id_categoria=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
