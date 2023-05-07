<?
class ChatControlador extends ControladorPadre
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
                //Si no se pone nada mostrara todos los mensajes
                $lista = ChatDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                //Listar mensajes por usuario
                if ((isset($_GET['id_usuario_envia'])) && (isset($_GET['id_usuario_recibe']))) {
                    $mensaje = ChatDAO::findByIdUser($_GET['id_usuario_envia'], $_GET['id_usuario_recibe']);
                    $data = json_encode($mensaje);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else {
                    self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
                }
            }
        } elseif (count($recurso) == 3) {
            //Listar mensajes por id
            $mensaje = ChatDAO::findById($recurso[2]);
            $data = json_encode($mensaje);
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
        $dato['fecha_mensaje'] = date('Y-m-d H:i:s');

        if (isset($dato['descripcion_mensaje']) && isset($dato['fecha_mensaje']) && isset($dato['id_usuario_envia']) && isset($dato['id_usuario_recibe'])) {
            $mensaje = new Chat($dato['descripcion_mensaje'], $dato['fecha_mensaje'], $dato['id_usuario_envia'], $dato['id_usuario_recibe']);
            if (ChatDAO::insert($mensaje)) {
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

            if (isset($dato['descripcion_mensaje']) && isset($dato['fecha_mensaje']) && isset($dato['id_usuario_envia']) && isset($dato['id_usuario_recibe'])) {
                $mensaje = new Chat($dato['descripcion_mensaje'], $dato['fecha_mensaje'], $dato['id_usuario_envia'], $dato['id_usuario_recibe']);
                $mensaje->id_mensaje = $recurso[2];
                if (ChatDAO::update($mensaje)) {
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
            self::respuesta('', array('HTTP/1.1 400 El recurso esta mal formado /conciertos/{id}'));
        }
    }

    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            if (ChatDAO::delete($recurso[2])) {
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
