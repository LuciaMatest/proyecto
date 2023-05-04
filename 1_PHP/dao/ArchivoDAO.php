<?php
class ArchivoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from archivo;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayArchivo = array();
        while ($objeto = $resultado->fetchObject()) {
            $archivo = new Archivo(
                $objeto->id_archivo,
                $objeto->nombre_archivo,
                $objeto->url_archivo,
                $objeto->descripcion_archivo,
                $objeto->proyecto_id
            );
            array_push($arrayArchivo, $archivo);
        }
        return $arrayArchivo;
    }

    public static function findById($id)
    {
        $sql = 'select * from archivo where id_archivo=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $archivo = new Archivo(
                $objeto->id_archivo,
                $objeto->nombre_archivo,
                $objeto->url_archivo,
                $objeto->descripcion_archivo,
                $objeto->proyecto_id
            );
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
        $datos = array(
            $objeto->nombre_archivo,
            $objeto->url_archivo,
            $objeto->descripcion_archivo,
            $objeto->proyecto_id
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
