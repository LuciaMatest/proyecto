<?php
class ImagenDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from imagen;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayImagen = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayImagen;
    }

    public static function findById($id)
    {
        $sql = 'select * from imagen where id_imagen = ?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = 'No existe la imagen';
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
        $inserta = 'insert into imagen (url_imagen) values (?)';
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
