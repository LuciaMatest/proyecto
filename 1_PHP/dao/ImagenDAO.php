<?php
class ImagenDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from imagen;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayImagen = array();
        while ($objeto = $resultado->fetchObject()) {
            $imagen = new Imagen(
                $objeto->id_imagen,
                $objeto->url_imagen
            );
            array_push($arrayImagen, $objeto);
        }
        return $arrayImagen;
    }

    public static function findById($id)
    {
        $sql = 'select * from imagen where id_imagen = ?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $imagen = new Imagen(
                $objeto->id_imagen,
                $objeto->url_imagen
            );
        } else {
            return 'No existe la imagen';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update imagen set url_imagen=? where id_imagen=?;';
        $datos = array(
            $objeto->url_imagen,
            $objeto->id_imagen
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
        $inserta = 'insert into imagen values (null,?)';
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
        $elimina = 'delete from imagen where id_imagen=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
