<?php
class UsuarioDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from usuario;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayUsuario = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayUsuario;
    }

    public static function findById($id)
    {
        $sql = 'select * from usuario where id_usuario=?;';
        $datos = array($id);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = 'No existe el usuario';
        }
    }

    public static function findByName($nombre)
    {
        $sql = 'select * from usuario where nombre_usuario=?;';
        $datos = array($nombre);
        $resultado = parent::ejecuta($sql, $datos);
        $objeto = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($objeto) {
            return $objeto;
        } else {
            $_SESSION['error'] = 'No existe el usuario';
        }
    }

    public static function findUserActive()
    {
        $sql = 'select * from usuario where borrado_usuario = 0;';
        $datos = array();
        $resultado = parent::ejecuta($sql, $datos);
        $arrayUsuario = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $arrayUsuario;
    }

    public static function update($objeto)
    {
        $actualiza = 'update usuario set nombre_usuario=?,telefono_usuario=?,email_usuario=?,contrasena_usuario=? where id_usuario=?;';
        $datos = array(
            $objeto->nombre_usuario,
            $objeto->telefono_usuario,
            $objeto->email_usuario,
            $objeto->contrasena_usuario,
            $objeto->id_usuario
        );
        $resultado = parent::ejecuta($actualiza, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function borradoLogic($objeto)
    {
        $actualiza = 'update usuario set borrado_usuario = 1 where id_usuario=?;';
        $datos = array($objeto->id_usuario);
        $resultado = parent::ejecuta($actualiza, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }


    public static function insert($objeto)
    {
        $inserta = "insert into usuario (nombre_usuario, telefono_usuario, email_usuario, contrasena_usuario, borrado_usuario) values (?,?,?,?,?)";
        $datos = array(
            $objeto->nombre_usuario,
            $objeto->telefono_usuario,
            $objeto->email_usuario,
            $objeto->contrasena_usuario,
            0
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
        $elimina = 'delete from usuario where id_usuario=?';
        $datos = array($id);
        $resultado = parent::ejecuta($elimina, $datos);
        if ($resultado->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function valida($email, $pass)
    {
        // Aplicar el hash SHA1 a la contraseña
        $hashed_pass = sha1($pass);

        $sql = 'select * from usuario where email_usuario=? and contrasena_usuario=?;';
        // Reemplazar $pass con $hashed_pass en el array $datos
        $datos = array($email, $hashed_pass);
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
            $_SESSION['error'] = 'No existe el usuario';
            return null;
        }
    }
}
