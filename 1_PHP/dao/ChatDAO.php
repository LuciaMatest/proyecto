<?php
class ChatDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from mensaje;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayMensaje = array();
        while ($objeto = $resultado->fetchObject()) {
            $mensaje = new Chat(
                $objeto->id_mensaje,
                $objeto->descripcion_mensaje,
                $objeto->fecha_mensaje,
                $objeto->id_usuario_envia,
                $objeto->id_usuario_recibe
            );
            array_push($arrayMensaje, $mensaje);
        }
        return $arrayMensaje;
    }

    public static function findById($id)
    {
        $sql = 'select * from mensaje where id_mensaje=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $mensaje = new Chat(
                $objeto->id_mensaje,
                $objeto->descripcion_mensaje,
                $objeto->fecha_mensaje,
                $objeto->id_usuario_envia,
                $objeto->id_usuario_recibe
            );
        } else {
            $_SESSION['error'] = 'No existe el mensaje';
        }
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
        $datos = array(
            $objeto->descripcion_mensaje,
            $objeto->fecha_mensaje,
            $objeto->id_usuario_envia,
            $objeto->id_usuario_recibe
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
