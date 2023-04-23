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
                $objeto->usuario_nombre
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
                $objeto->usuario_nombre
            );
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el mensaje</span>';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update mensaje set descripcion_mensaje=?,fecha_mensaje=?,usuario_nombre=? where id_mensaje=?;';
        $datos = array(
            $objeto->descripcion_mensaje,
            $objeto->fecha_mensaje,
            $objeto->usuario_nombre,
            $objeto->id_mensaje
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
        $inserta = "insert into mensaje (descripcion_mensaje, fecha_mensaje, usuario_nombre) values (?,?,?)";
        $datos = array(
            $objeto->descripcion_mensaje,
            $objeto->fecha_mensaje,
            $objeto->usuario_nombre
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