<?
class UsuarioControlador extends ControladorPadre
{
    public function controlar()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch ($metodo) {
            case 'GET':
                $this->buscar();
                break;
            case 'POST':
                $this->insertar();
                break;
            case 'PUT':
                $this->modificar();
                break;
            case 'DELETE':
                $this->borrar();
                break;
            default:
                ControladorPadre::respuesta('', array('HTTP/1.1 400 No se ha iniciado recurso'));
                return null;
        }
    }

    public function buscar()
    {
        $parametros = $this->parametros();
        $recurso = self::recurso();
        if (count($recurso) == 2) {
            if (!$parametros) {
                //Si no se pone nada mostrara todos los usuarios
                $lista = UsuarioDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                //Listar usuarios por nombre
                if (isset($_GET['nombre'])) {
                    $usuario = UsuarioDAO::findByName($_GET['nombre']);
                    $data = json_encode($usuario);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else {
                    self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
                }
            }
        } elseif (count($recurso) == 3) {
            //Listar archivos por id
            $usuario = UsuarioDAO::findById($recurso[2]);
            $data = json_encode($usuario);
            self::respuesta(
                $data,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
    }

    public function insertar()
    {
        $body = file_get_contents('php://input');
        $dato = json_decode($body, true);

        if (isset($dato['nombre_usuario']) && isset($dato['telefono_usuario']) && isset($dato['email_usuario']) && isset($dato['contrasena_usuario']) && isset($dato['borrado_usuario'])) {
            $usuario = new Usuario($dato['nombre_usuario'], $dato['telefono_usuario'], $dato['email_usuario'], $dato['contrasena_usuario'], $dato['borrado_usuario']);
            if (UsuarioDAO::insert($usuario)) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            };
        } else {
            self::respuesta('', array('HTTP/1.1 400 No se ha insertado correctamente'));
        }
    }

    public function modificar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body, true);

            if (isset($dato['nombre_usuario']) && isset($dato['telefono_usuario']) && isset($dato['email_usuario']) && isset($dato['contrasena_usuario']) && isset($dato['borrado_usuario'])) {
                $usuario = new Usuario($dato['nombre_usuario'], $dato['telefono_usuario'], $dato['email_usuario'], $dato['contrasena_usuario'], $dato['borrado_usuario']);
                $usuario->id_usuario = $recurso[2];
                if (UsuarioDAO::update($usuario)) {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 Ya no existe, no se ha modificado')
                    );
                }
            }
        } else {
            self::respuesta('', array('HTTP/1.1 400 El recurso esta mal formado /usuario/{id}'));
        }
    }

    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            if (UsuarioDAO::delete($recurso[2])) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 Ya no existe, no se ha borrado')
                );
            }
        } else {
            self::respuesta('', array('HTTP/1.1 400 No se ha podido eliminar correctamente'));
        }
    }
}
