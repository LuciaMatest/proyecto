<?php
class UsuarioDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from usuario;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayUsuario = array();
        while ($objeto = $resultado->fetchObject()) {
            $usuario = new Usuario(
                $objeto->id_usuario,
                $objeto->nombre_usuario,
                $objeto->telefono_usuario,
                $objeto->email_usuario,
                $objeto->contrasena_usuario,
                $objeto->borrado_usuario,
                $objeto->tipo_usuario
            );
            array_push($arrayUsuario, $usuario);
        }
        return $arrayUsuario;
    }

    public static function findById($id)
    {
        $sql = 'select * from usuario where id_usuario=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $usuario = new Usuario(
                $objeto->id_usuario,
                $objeto->nombre_usuario,
                $objeto->telefono_usuario,
                $objeto->email_usuario,
                $objeto->contrasena_usuario,
                $objeto->borrado_usuario,
                $objeto->tipo_usuario
            );
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el usuario</span>';
        }
    }

    public static function update($objeto)
    {
        $actualiza = 'update usuario set nombre_usuario=?,telefono_usuario=?,email_usuario=?,contrasena_usuario=?,borrado_usuario=?,tipo_usuario=? where id_usuario=?;';
        $datos = array(
            $objeto->id_usuario,
            $objeto->nombre_usuario,
            $objeto->telefono_usuario,
            $objeto->email_usuario,
            $objeto->contrasena_usuario,
            $objeto->borrado_usuario,
            $objeto->tipo_usuario
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
        $inserta = 'insert into usuario values (?,?,?,?,?,?)';
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
        $elimina = 'delete from usuario where id_usuario=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function valida($user, $pass)
    {
        $sql = 'select * from usuario where email_usuario=? and contrasena_usuario=?;';
        $passh = sha1($pass);
        $datos = array($user, $passh);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetchObject();
        if ($objeto) {
            return $usuario = new Usuario(
                $objeto->id_usuario,
                $objeto->nombre_usuario,
                $objeto->telefono_usuario,
                $objeto->email_usuario,
                $objeto->contrasena_usuario,
                $objeto->borrado_usuario,
                $objeto->tipo_usuario
            );
        } else {
            $_SESSION['error'] = '<span style="color:brown"> No existe el usuario</span>';
            return null;
        }
    }
}
