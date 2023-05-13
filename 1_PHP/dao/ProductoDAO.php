<?php
class ProductoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select producto.*, imagen.url_imagen from producto join imagen on producto.imagen_id = imagen.id_imagen;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayProducto = array();
        while ($objeto = $resultado->fetchObject()) {
            $producto = new Producto(
                $objeto->id_producto,
                $objeto->nombre_producto,
                $objeto->descripcion_producto,
                $objeto->precio,
                $objeto->cantidad,
                $objeto->categoria_id,
                $objeto->proyecto_id,
                $objeto->imagen_id
            );
            array_push($arrayProducto, $objeto);
        }
        return $arrayProducto;
    }

    public static function findById($id)
    {
        $sql = 'select p.*, i.url_imagen from producto p join imagen i on p.imagen_id = i.id_imagen where p.id_producto = ?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $producto = new Producto(
                $objeto->id_producto,
                $objeto->nombre_producto,
                $objeto->descripcion_producto,
                $objeto->precio,
                $objeto->cantidad,
                $objeto->categoria_id,
                $objeto->proyecto_id,
                $objeto->imagen_id
            );
        } else {
            return 'No existe el producto';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update producto set nombre_producto=?,descripcion_producto=?,precio=?,cantidad=?,categoria_id=?,imagen_id=?,proyecto_id=? where id_producto=?;';
        $datos = array(
            $objeto->nombre_producto,
            $objeto->descripcion_producto,
            $objeto->precio,
            $objeto->cantidad,
            $objeto->categoria_id,
            $objeto->proyecto_id,
            $objeto->imagen_id,
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
        $inserta = 'insert into producto values (null,?,?,?,?,?,?,?)';
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
