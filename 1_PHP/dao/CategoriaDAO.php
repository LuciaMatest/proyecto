<?php
class CategoriaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from categoria;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayCategoria = array();
        while ($objeto = $resultado->fetchObject()) {
            $categoria = new Categoria(
                $objeto->id_categoria,
                $objeto->nombre_categoria
            );
            array_push($arrayCategoria, $objeto);
        }
        return $arrayCategoria;
    }

    public static function findById($id)
    {
        $sql = 'select * from categoria where id_categoria=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $categoria = new Categoria(
                $objeto->id_categoria,
                $objeto->nombre_categoria
            );
        } else {
            return 'No existe el categoria';
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
        $resultado = parent::ejecuta($inserta, $datos);
        if ($resultado->rowCount() == 0) {
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
