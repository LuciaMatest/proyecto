<?php
require_once('./curl.php');


//------------------------------------------------------------------------------------------------------------------------------------------------------
// USUARIO
function getAllUsuarios()
{
    // URL de la API para obtener todos los usuarios
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $usuarios = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($usuarios)) {
        return $usuarios;
    } else {
        echo "Error al obtener los usuarios";
        return null;
    }
}

function getNameUsuario($nombre_usuario)
{
    // Construir la URL de búsqueda con el nombre del usuario
    $baseUrl = "http://192.168.0.214/proyecto/2_API/portafolio/usuario";
    $url = $baseUrl . "?nombre=" . $nombre_usuario;

    // Llamar a la función get($url) con la URL construida
    $response = get($url);

    // Procesar la respuesta
    $usuario = json_decode($response, true);

    if (is_array($usuario) && !empty($usuario)) {
        return $usuario;
    } else {
        echo "No se encontraron usuarios con el nombre: " . $nombre_usuario . "\n";
    }
}

function getIdUsuario($id_usuario)
{
    // Construir la URL de búsqueda con el id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id_usuario;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron usuarios con el ID: " . $id_usuario . "\n";
    } else {
        return $respuesta;
    }
}


function postUsuario($nombre_usuario, $telefono_usuario, $email_usuario, $contrasena_usuario)
{
    // Definir la URL para insertar usuarios
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario";

    // Crear el array de datos
    $datosUsuario = array(
        'nombre_usuario' => $nombre_usuario,
        'telefono_usuario' => $telefono_usuario,
        'email_usuario' => $email_usuario,
        'contrasena_usuario' => $contrasena_usuario,
        0
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosUsuario);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putUsuario($id_usuario, $nombre_usuario, $telefono_usuario, $email_usuario, $contrasena_usuario)
{
    // Construir la URL de modificación con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id_usuario;

    // Crear el array de datos
    $datosActualizados = array(
        'nombre_usuario' => $nombre_usuario,
        'telefono_usuario' => $telefono_usuario,
        'email_usuario' => $email_usuario,
        'contrasena_usuario' => $contrasena_usuario,
        0
    );

    // Convertir los datos del usuario en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteLogicUsuario($id_usuario)
{
    // Construir la URL de modificación con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id_usuario;

    // Crear una cadena JSON con el valor de borrado_usuario a actualizar
    $data = json_encode(array('borrado_usuario' => 1));

    // Llamar a la función put con el URL y los datos
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteUsuario($id_usuario)
{
    // Construir la URL de borrado con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id_usuario;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}
//------------------------------------------------------------------------------------------------------------------------------------------------------
// PROYECTO
function getAllProyectos()
{
    // URL de la API para obtener todos los proyectos
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/proyecto";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $proyectos = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($proyectos)) {
        return $proyectos;
    } else {
        echo "Error al obtener los proyectos";
        return null;
    }
}

function getIdProyecto($id_proyecto)
{
    // Construir la URL de búsqueda con el id del proyecto
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/proyecto/";
    $url = $base_url . $id_proyecto;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron proyectos con el ID: " . $id_proyecto . "\n";
    } else {
        return $respuesta;
    }
}

function postProyecto($nombre_proyecto, $fecha_proyecto, $usuario_id, $factura_id)
{
    // Definir la URL para insertar proyectos
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/proyecto";

    // Crear el array de datos
    $datosProyecto = array(
        'nombre_proyecto' => $nombre_proyecto,
        'fecha_proyecto' => $fecha_proyecto,
        'usuario_id' => $usuario_id,
        'factura_id' => $factura_id
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosProyecto);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putProyecto($id_proyecto, $nombre_proyecto, $fecha_proyecto, $usuario_id, $factura_id)
{
    // Construir la URL de modificación con la id del proyecto
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/proyecto/";
    $url = $base_url . $id_proyecto;

    // Crear el array de datos
    $datosActualizados = array(
        'nombre_proyecto' => $nombre_proyecto,
        'fecha_proyecto' => $fecha_proyecto,
        'usuario_id' => $usuario_id,
        'factura_id' => $factura_id
    );

    // Convertir los datos del proyecto en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteProyecto($id_proyecto)
{
    // Construir la URL de borrado con la id del proyecto
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/proyecto/";
    $url = $base_url . $id_proyecto;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}


//------------------------------------------------------------------------------------------------------------------------------------------------------
// PRODUCTO
function getAllProductos()
{
    // URL de la API para obtener todos los productos
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/producto";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $productos = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($productos)) {
        return $productos;
    } else {
        echo "Error al obtener los productos";
        return null;
    }
}

function getIdProducto($id_producto)
{
    // Construir la URL de búsqueda con el id del producto
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/producto/";
    $url = $base_url . $id_producto;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron productos con el ID: " . $id_producto . "\n";
    } else {
        return $respuesta;
    }
}

function postProducto($nombre_producto, $descripcion_producto, $precio, $cantidad, $categoria_id, $proyecto_id, $imagen_id)
{
    // Definir la URL para insertar productos
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/producto";

    // Crear el array de datos
    $datosProducto = array(
        'nombre_producto' => $nombre_producto,
        'descripcion_producto' => $descripcion_producto,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'categoria_id' => $categoria_id,
        'proyecto_id' => $proyecto_id,
        'imagen_id' => $imagen_id
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosProducto);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putProducto($id_producto, $nombre_producto, $descripcion_producto, $precio, $cantidad, $categoria_id, $proyecto_id, $imagen_id)
{
    // Construir la URL de modificación con la id del producto
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/producto/";
    $url = $base_url . $id_producto;


    // Crear el array de datos
    $datosActualizados = array(
        'nombre_producto' => $nombre_producto,
        'descripcion_producto' => $descripcion_producto,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'categoria_id' => $categoria_id,
        'proyecto_id' => $proyecto_id,
        'imagen_id' => $imagen_id
    );

    // Convertir los datos del producto en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteProducto($id_producto)
{
    // Construir la URL de borrado con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/producto/";
    $url = $base_url . $id_producto;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}


//------------------------------------------------------------------------------------------------------------------------------------------------------
// FACTURA
function getAllFacturas()
{
    // URL de la API para obtener todas las facturas
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/factura";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $facturas = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($facturas)) {
        return $facturas;
    } else {
        echo "Error al obtener las facturas";
        return null;
    }
}

function getIdFactura($id_factura)
{
    // Construir la URL de búsqueda con el id de la factura
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/factura/";
    $url = $base_url . $id_factura;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron facturas con el ID: " . $id_factura . "\n";
    } else {
        return $respuesta;
    }
}

function getDateFactura($fecha_factura)
{
    // Construir la URL de búsqueda con el nombre de la factura
    $baseUrl = "http://192.168.0.214/proyecto/2_API/portafolio/factura";
    $url = $baseUrl . "?fecha=" . $fecha_factura;

    // Llamar a la función get($url) con la URL construida
    $response = get($url);

    // Procesar la respuesta
    $factura = json_decode($response, true);

    if (is_array($factura) && !empty($factura)) {
        return $factura;
    } else {
        echo "No se encontraron facturas con la fecha: " . $fecha_factura . "\n";
    }
}

function postFactura($nombre_factura, $fecha_pago, $fecha_factura, $estado)
{
    // Definir la URL para insertar facturas
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/factura";

    // Crear el array de datos
    $datosFactura = array(
        'nombre_factura' => $nombre_factura,
        'fecha_pago' => $fecha_pago,
        'fecha_factura' => $fecha_factura,
        'estado' => $estado
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosFactura);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putFactura($id_factura, $nombre_factura, $fecha_pago, $fecha_factura, $estado)
{
    // Construir la URL de inserción
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/factura/";
    $url = $base_url . $id_factura;

    // Crear el array de datos
    $datosActualizados = array(
        'nombre_factura' => $nombre_factura,
        'fecha_pago' => $fecha_pago,
        'fecha_factura' => $fecha_factura,
        'estado' => $estado
    );

    // Convertir los datos de la factura en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteFactura($id_factura)
{
    // Construir la URL de borrado con la id de la factura
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/factura/";
    $url = $base_url . $id_factura;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}


//------------------------------------------------------------------------------------------------------------------------------------------------------
//IMAGEN
function getAllImagenes()
{
    // URL de la API para obtener todas las imágenes
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/imagen";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $imagenes = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($imagenes)) {
        return $imagenes;
    } else {
        echo "Error al obtener las imágenes";
        return null;
    }
}

function getIdImagen($id_imagen)
{
    // Construir la URL de búsqueda con el id de la imagen
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/imagen/";
    $url = $base_url . $id_imagen;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron imágenes con el ID: " . $id_imagen . "\n";
    } else {
        return $respuesta;
    }
}

function postImagen($url_imagen)
{
    // Definir la URL para insertar usuarios
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/imagen";

    // Crear el array de datos
    $datosImagen = array(
        'url_imagen' => $url_imagen
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosImagen);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putImagen($id_imagen, $url_imagen)
{
    // Construir la URL de modificación con la id del imagen
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/imagen/";
    $url = $base_url . $id_imagen;

    // Crear el array de datos
    $datosActualizados = array(
        'url_imagen' => $url_imagen
    );

    // Convertir los datos de la factura en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteImagen($id_imagen)
{
    // Construir la URL de borrado con la id de la imagen
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/imagen/";
    $url = $base_url . $id_imagen;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}


//------------------------------------------------------------------------------------------------------------------------------------------------------
//CATEGORIA
function getAllCategorias()
{
    // URL de la API para obtener todas las categorias
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/categoria";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $categorias = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($categorias)) {
        return $categorias;
    } else {
        echo "Error al obtener las categorias";
        return null;
    }
}

function getIdCategoria($id_categoria)
{
    // Construir la URL de búsqueda con el id de la categoria
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/categoria/";
    $url = $base_url . $id_categoria;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron categorias con el ID: " . $id_categoria . "\n";
    } else {
        return $respuesta;
    }
}

function getNameCategoria($nombre_categoria)
{
    // Construir la URL de búsqueda con el nombre de la categoria
    $baseUrl = "http://192.168.0.214/proyecto/2_API/portafolio/categoria";
    $url = $baseUrl . "?nombre=" . $nombre_categoria;

    // Llamar a la función get($url) con la URL construida
    $response = get($url);

    // Procesar la respuesta
    $categoria = json_decode($response, true);
    if (is_array($categoria) && !empty($categoria)) {
        return $categoria;
    } else {
        echo "No se encontraron usuarios con el nombre: " . $nombre_categoria . "\n";
    }
}

function postCategoria($nombre_categoria)
{
    // Definir la URL para insertar categorias
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/categoria";

    // Crear el array de datos
    $datosCategoria = array(
        'nombre_categoria' => $nombre_categoria
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosCategoria);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putCategoria($id_categoria, $nombre_categoria)
{
    // Construir la URL de modificación con la id de la categoria
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/categoria/";
    $url = $base_url . $id_categoria;

    // Crear el array de datos
    $datosActualizados = array(
        'nombre_categoria' => $nombre_categoria
    );

    // Convertir los datos de la factura en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteCategoria($id_categoria)
{
    // Construir la URL de borrado con la id de la categoria
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/categoria/";
    $url = $base_url . $id_categoria;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}


//------------------------------------------------------------------------------------------------------------------------------------------------------
//MENSAJE
function getAllMensajes()
{
    // URL de la API para obtener todas los mensajes
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje";

    // Llamada a la función get() con la URL de la API
    $response = get($url);

    // Decodificar la respuesta JSON
    $mensajes = json_decode($response, true);

    // Verificar si la respuesta es válida
    if (is_array($mensajes)) {
        return $mensajes;
    } else {
        echo "Error al obtener los mensajes";
        return null;
    }
}

function getIdMensaje($id_mensaje)
{
    // Construir la URL de búsqueda con el id del mensaje
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje/";
    $url = $base_url . $id_mensaje;

    // Llamar a la función get($url) con la URL construida
    $respuesta = get($url);

    // Verificar si el array está vacío o no
    if (empty($respuesta)) {
        echo "No se encontraron mensajes con el ID: " . $id_mensaje . "\n";
    } else {
        return $respuesta;
    }
}

function getMensajeIdUsuario($id_usuario)
{
    // Construir la URL de búsqueda con la id del usuario que envia o recibe mensaje
    $baseUrl = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje";
    $url = $baseUrl . "?usuario_id=" . $id_usuario;

    // Llamar a la función get($url) con la URL construida
    $response = get($url);

    // Procesar la respuesta
    $mensaje = json_decode($response, true);
    if (is_array($mensaje) && !empty($mensaje)) {
        return $mensaje;
    } else {
        echo "No se encontraron usuarios con la id: " . $id_usuario . "\n";
    }
}

function postMensaje($descripcion_mensaje, $fecha_mensaje, $usuario_id, $admin_d)
{
    // Definir la URL para insertar mensajes
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje";

    // Crear el array de datos
    $datosMensaje = array(
        'descripcion_mensajes' => $descripcion_mensaje,
        'fecha_mensajes' => $fecha_mensaje,
        'usuario_id' => $usuario_id,
        'admin_d' => $admin_d
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosMensaje);

    // Llamar a la función post y enviar los datos
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putMensaje($id_mensaje, $descripcion_mensaje, $fecha_mensaje, $usuario_id, $admin_d)
{
    // Construir la URL de modificación con la id del mensaje
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje/";
    $url = $base_url . $id_mensaje;

    // Crear el array de datos
    $datosActualizados = array(
        'descripcion_mensajes' => $descripcion_mensaje,
        'fecha_mensajes' => $fecha_mensaje,
        'usuario_id' => $usuario_id,
        'admin_d' => $admin_d
    );

    // Convertir los datos del usuario en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteMensaje($id_mensaje)
{
    // Construir la URL de borrado con la id del mensaje
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/mensaje/";
    $url = $base_url . $id_mensaje;

    // Llamar a la función delete con el URL
    $response = delete($url);

    // Retornar el resultado de la petición
    return $response;
}
