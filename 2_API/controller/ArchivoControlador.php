<?
class ArchivoControlador extends ControladorPadre
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
                //Si no se pone nada mostrara todos los archivos
                $lista = ArchivoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                //Listar archivos por nombre
                if (isset($_GET['nombre'])) {
                    $archivo = ArchivoDAO::findByName($_GET['nombre']);
                    $data = json_encode($archivo);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else if (isset($_GET['proyecto'])) {
                    //Listar archivos por id de proyecto
                    $sensores = ArchivoDAO::findByIdProd($_GET["proyecto"]);
                    $data = json_encode($sensores);
                    self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                } else {
                    self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
                }
            }
        } elseif (count($recurso) == 3) {
            //Listar archivos por id
            $archivo = ArchivoDAO::findById($recurso[2]);
            $data = json_encode($archivo);
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

        if (isset($dato['nombre_archivo']) && isset($dato['url_archivo']) && isset($dato['descripcion_archivo']) && isset($dato['proyecto_id'])) {
            $archivo = new Archivo($dato['nombre_archivo'], $dato['url_archivo'], $dato['descripcion_archivo'], $dato['proyecto_id']);
            if (ArchivoDAO::insert($archivo)) {
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

            if (isset($dato['nombre_archivo']) && isset($dato['url_archivo']) && isset($dato['descripcion_archivo']) && isset($dato['proyecto_id'])) {
                $archivo = new Archivo($dato['nombre_archivo'], $dato['url_archivo'], $dato['descripcion_archivo'], $dato['proyecto_id']);
                $archivo->id_archivo = $recurso[2];
                if (ArchivoDAO::update($archivo)) {
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
            if (ArchivoDAO::delete($recurso[2])) {
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
