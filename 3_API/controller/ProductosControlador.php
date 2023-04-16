<?
class ProductosControlador extends ControladorPadre
{
    //Para manejar todas las acciones que podemos realizar con los productos creamos la funcion controlar
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

    //Una funcion por cada una de las acciones que podemos realizar
    //Buscar todos los productos/ por id 
    public function buscar()
    {
        $parametros = $this->parametros();
        $recurso = self::recurso();
        //recurso productos
        if (count($recurso) == 2) {
            if (!$parametros) {
                //Listar productos
                $lista = ProductoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                self::respuesta('', array('HTTP/1.1 400 No se ha utilizado un filtro correcto'));
            }
        } elseif (count($recurso) == 3) {
            $producto = ProductoDAO::findById($recurso[2]);
            $data = json_encode($producto);
            self::respuesta(
                $data,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
    }
    //Añadir nuevo producto
    public function insertar()
    {
        $body = file_get_contents('php://input');
        $dato = json_decode($body, true);
        //propiedades
        if (isset($dato['nombre_producto']) && isset($dato['descripcion_producto']) && isset($dato['imagen_producto']) && isset($dato['precio']) && isset($dato['cantidad']) && isset($dato['categoria_id'])) {
            $producto = new Producto($dato['nombre_producto'], $dato['descripcion_producto'], $dato['imagen_producto'], $dato['precio'], $dato['cantidad'], $dato['categoria_id']);
            if (ProductoDAO::insert($producto)) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            };
        } else {
            self::respuesta('', array('HTTP/1.1 400 No se ha insertado correctamente'));
        }
    }
    //Modificar producto ya existente
    public function modificar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body, true);
            if (isset($dato['nombre_producto']) && isset($dato['descripcion_producto']) && isset($dato['imagen_producto']) && isset($dato['precio']) && isset($dato['cantidad']) && isset($dato['categoria_id'])) {
                $producto = new Producto($dato['nombre_producto'], $dato['descripcion_producto'], $dato['imagen_producto'], $dato['precio'], $dato['cantidad'], $dato['categoria_id']);
                $producto->id_producto = $recurso[2];
                if (ProductoDAO::update($producto)) {
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
    //Borrar producto
    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            if (ProductoDAO::delete($recurso[2])) {
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
