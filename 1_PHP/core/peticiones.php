<?php
require_once('./curl.php');

function getAllUsers()
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

function getNameUser($nombre)
{
    // Construir la URL de búsqueda con el nombre del usuario
    $baseUrl = "http://192.168.0.214/proyecto/2_API/portafolio/usuario";
    $url = $baseUrl . "?nombre=" . $nombre;

    // Llamar a la función get($url) con la URL construida
    $response = get($url);

    // Procesar la respuesta (puedes ajustar este bloque según sea necesario)
    $usuario = json_decode($response, true);
    if (is_array($usuario) && !empty($usuario)) {
        return $usuario;
        // Imprimir los usuarios encontrados
        // foreach ($usuarios as $usuario) {
        //     echo "ID: " . $usuario['id'] . ", Nombre: " . $usuario['nombre'] . "\n";
        // }
    } else {
        echo "No se encontraron usuarios con el nombre: " . $nombre . "\n";
    }
}

function getIdUSer($id)
{
    // Construir la URL de búsqueda con el id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id;

    // Inicializar cURL
    $ch = curl_init();

    // Establecer opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Ejecutar la solicitud y obtener la respuesta
    $respuesta = curl_exec($ch);

    // Verificar si ocurrió algún error
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }

    // Cerrar cURL
    curl_close($ch);

    return $respuesta;
}

function postUser($nombre, $telefono, $email, $contrasena)
{
    // Definir la URL para insertar usuarios
    $url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario";

    // Crear el array de datos del usuario
    $datosUsuario = array(
        'nombre_usuario' => $nombre,
        'telefono_usuario' => $telefono,
        'email_usuario' => $email,
        'contrasena_usuario' => $contrasena,
        0
    );

    // Convertir el array de datos a formato JSON
    $dataJson = json_encode($datosUsuario);

    // Llamar a la función post y enviar los datos del usuario
    $resultado = post($url, $dataJson);

    // Devolver el resultado
    return $resultado;
}

function putUser($id, $nombre, $telefono, $email, $contrasena)
{
    // Construir la URL de modificación con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id;

    // Crear el array de datos del usuario
    $datosActualizados = array(
        'nombre_usuario' => $nombre,
        'telefono_usuario' => $telefono,
        'email_usuario' => $email,
        'contrasena_usuario' => $contrasena,
        0
    );

    // Convertir los datos del usuario en formato JSON
    $data = json_encode($datosActualizados);

    // Llamar a la función 'put' para realizar la petición PUT
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}

function deleteLogicUser($id)
{
    // Construir la URL de modificación con la id del usuario
    $base_url = "http://192.168.0.214/proyecto/2_API/portafolio/usuario/";
    $url = $base_url . $id;

    // Crear una cadena JSON con el valor de borrado_usuario a actualizar
    $data = json_encode(array('borrado_usuario' => 1));

    // Llamar a la función put con el URL y los datos
    $response = put($url, $data);

    // Retornar el resultado de la petición
    return $response;
}
