<?php
class Usuario
{
    private $nombre_usuario;
    private $telefono_usuario;
    private $email_usuario;
    private $contrasena_usuario;
    private $borrado_usuario;
    private $tipo_usuario;

    public function __construct($nombre_usuario, $telefono_usuario, $email_usuario, $contrasena_usuario, $borrado_usuario, $tipo_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
        $this->telefono_usuario = $telefono_usuario;
        $this->email_usuario = $email_usuario;
        $this->contrasena_usuario = $contrasena_usuario;
        $this->borrado_usuario = $borrado_usuario;
        $this->tipo_usuario = $tipo_usuario;
    }

    public function __get($get)
    {
        //Si la propiedad no existiera retornaría null
        if (property_exists(__CLASS__, $get)) {
            return $this->$get;
        }
        return null;
    }

    public function __set($set, $valor)
    {
        if (property_exists(__CLASS__, $set)) {
            return $this->$set = $valor;
        }
    }
}
