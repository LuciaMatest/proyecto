<?
class FacturaControlador extends ControladorPadre
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
                //Si no se pone nada mostrara todos las facturas
                $lista = FacturaDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                //Listar archivos por fecha
                if (isset($_GET['fecha'])) {
                    $archivo = FacturaDAO::findByFecha($_GET['fecha']);
                    $data = json_encode($archivo);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else {
                    self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
                }
            }
        } elseif (count($recurso) == 3) {
            //Listar facturas por id
            $factura = FacturaDAO::findById($recurso[2]);
            $data = json_encode($factura);
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
        $dato['fecha_pago'] = date('Y-m-d H:i:s');
        $dato['fecha_factura'] = date('Y-m-d H:i:s');

        if (isset($dato['nombre_factura']) && isset($dato['fecha_pago']) && isset($dato['fecha_factura']) && isset($dato['estado'])) {
            $factura = new Factura($dato['nombre_factura'], $dato['fecha_pago'], $dato['fecha_factura'], $dato['estado']);
            if (FacturaDAO::insert($factura)) {
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

            if (isset($dato['nombre_factura']) && isset($dato['fecha_pago']) && isset($dato['fecha_factura']) && isset($dato['estado'])) {
                $factura = new Factura($dato['nombre_factura'], $dato['fecha_pago'], $dato['fecha_factura'], $dato['estado']);
                $factura->id_factura = $recurso[2];
                if (FacturaDAO::update($factura)) {
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
            self::respuesta('', array('HTTP/1.1 400 El recurso esta mal formado /factura/{id}'));
        }
    }

    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            if (FacturaDAO::delete($recurso[2])) {
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
