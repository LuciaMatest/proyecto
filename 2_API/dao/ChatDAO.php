<?php
class ChatDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from mensaje;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayMensajes = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayMensajes;
    }

    public static function findById($id)
    {
        $sql = 'select * from mensaje where id_mensaje=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el mensaje</span>';
        }
    }

    public static function findByIdUser($idUsuario)
    {
        $sql = 'select * from mensaje where id_usuario_envia=? or id_usuario_recibe=?;';
        $datos = array($idUsuario, $idUsuario);
        $resultado = parent::ejecuta($sql, $datos);
        $arrayMensajes = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayMensajes;
    }


    public static function update($objeto)
    {
        $actualiza = 'update mensaje set descripcion_mensaje=?,fecha_mensaje=?,id_usuario_envia=?,id_usuario_recibe=? where id_mensaje=?;';
        $datos = array(
            $objeto->id_mensaje,
            $objeto->descripcion_mensaje,
            $objeto->fecha_mensaje,
            $objeto->id_usuario_envia,
            $objeto->id_usuario_recibe
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
        $inserta = "insert into mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) values (?,?,?,?)";
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
        $elimina = 'delete from mensaje where id_mensaje=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
