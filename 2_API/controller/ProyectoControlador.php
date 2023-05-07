<?
class ProyectoControlador extends ControladorPadre
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
                //Si no se pone nada mostrara todos los proyectos
                $lista = ProyectoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
            }
        } elseif (count($recurso) == 3) {
            //Listar proyectos por id
            $proyecto = ProyectoDAO::findById($recurso[2]);
            $data = json_encode($proyecto);
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
        $dato['fecha_proyecto'] = date('Y-m-d H:i:s');

        if (isset($dato['nombre_proyecto']) && isset($dato['fecha_proyecto']) && isset($dato['usuario_id']) && isset($dato['factura_id'])) {
            $proyecto = new Proyecto($dato['nombre_proyecto'], $dato['fecha_proyecto'], $dato['usuario_id'], $dato['factura_id']);
            if (ProyectoDAO::insert($proyecto)) {
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
            $dato['fecha_proyecto'] = date('Y-m-d H:i:s');

            if (isset($dato['nombre_proyecto']) && isset($dato['fecha_proyecto']) && isset($dato['usuario_id']) && isset($dato['factura_id'])) {
                $proyecto = new Proyecto($dato['nombre_proyecto'], $dato['fecha_proyecto'], $dato['usuario_id'], $dato['factura_id']);
                $proyecto->id_proyecto = $recurso[2];
                if (ProyectoDAO::update($proyecto)) {
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
            self::respuesta('', array('HTTP/1.1 400 El recurso esta mal formado /proyecto/{id}'));
        }
    }

    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            if (ProyectoDAO::delete($recurso[2])) {
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
