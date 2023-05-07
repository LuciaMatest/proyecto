<?php
class ArchivoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from archivo;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayArchivo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayArchivo;
    }

    public static function findById($id)
    {
        $sql = 'select * from archivo where id_archivo=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el archivo</span>';
        }
    }

    public static function findByName($nombre)
    {
        $sql = 'select * from archivo where nombre_archivo = ?;';
        $datos = array($nombre);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el archivo</span>';
        }
    }

    public static function findByIdProd($proyecto_id)
    {
        $sql = 'select * from archivo where proyecto_id = ?;';
        $datos = array($proyecto_id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el archivo</span>';
        }
    }


    public static function update($objeto)
    {
        $actualiza = 'update archivo set nombre_archivo=?,url_archivo=?,descripcion_archivo=?,proyecto_id=? where id_archivo=?;';
        $datos = array(
            $objeto->nombre_archivo,
            $objeto->url_archivo,
            $objeto->descripcion_archivo,
            $objeto->proyecto_id,
            $objeto->id_archivo
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
        $inserta = "insert into archivo (nombre_archivo, url_archivo, descripcion_archivo, proyecto_id) values (?,?,?,?)";
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
        $elimina = 'delete from archivo where id_archivo=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
