<?php
class ProductoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select producto.*, imagen.url_imagen from producto join imagen on producto.imagen_id = imagen.id_imagen;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayProducto = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayProducto;
    }

    public static function findById($id)
    {
        $sql = 'select producto.*, imagen.url_imagen from producto join imagen on producto.imagen_id = imagen.id_imagen where id_producto=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            return 'No existe el producto';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update producto set nombre_producto=?,descripcion_producto=?,imagen_producto=?,precio=?,cantidad=?,categoria_id=?,proyecto_id=? where id_producto=?;';
        $datos = array(
            $objeto->nombre_producto,
            $objeto->descripcion_producto,
            $objeto->imagen_producto,
            $objeto->precio,
            $objeto->cantidad,
            $objeto->categoria_id,
            $objeto->proyecto_id,
            $objeto->id_producto
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
        $inserta = 'insert into producto values (?,?,?,?,?,?,?,?)';
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
        $elimina = 'delete from producto where id_producto=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
