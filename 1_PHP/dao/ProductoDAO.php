<?php
class ProductoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from producto;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayProducto = array();
        while ($objeto = $resultado->fetchObject()) {
            $producto = new Producto(
                $objeto->id_producto,
                $objeto->nombre_producto,
                $objeto->descripcion_producto,
                $objeto->imagen_producto,
                $objeto->precio,
                $objeto->cantidad,
                $objeto->categoria_id,
                $objeto->proyecto_id
            );
            array_push($arrayProducto, $objeto);
        }
        return $arrayProducto;
    }

    public static function findById($id)
    {
        $sql = 'select * from producto where id_producto=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $producto = new Producto(
                $objeto->id_producto,
                $objeto->nombre_producto,
                $objeto->descripcion_producto,
                $objeto->imagen_producto,
                $objeto->precio,
                $objeto->cantidad,
                $objeto->categoria_id,
                $objeto->proyecto_id
            );
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
