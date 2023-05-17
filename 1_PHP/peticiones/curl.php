<?php
//Funciones genéricas para el uso de la API que en peticiones.php se usaran en cada una de las opciones que disponemos
function get($url)
{
    // Inicializar cURL
    $ch = curl_init();

    // Establecer opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar si ocurrió algún error
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }

    // Cerrar cURL
    curl_close($ch);

    return $response;
}

function post($url, $data)
{
    // Inicializar cURL
    $ch = curl_init();

    // Configurar las opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type:application/json')
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Ejecutar la solicitud y guardar el resultado
    $resultado = curl_exec($ch);

    // Cerrar la conexión cURL
    curl_close($ch);

    // Devolver el resultado
    return $resultado;
}

function put($url, $data)
{
    // Inicializar cURL
    $ch = curl_init();

    // Establecer las opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type:aplication/json')
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Ejecutar la petición PUT
    $response = curl_exec($ch);

    // Cerrar la sesión cURL
    curl_close($ch);

    // Retornar el resultado de la petición
    return $response;
}

function delete($url)
{
    // Inicializar cURL
    $ch = curl_init();

    // Establecer la URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Establecer el método de solicitud como DELETE
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    // Establecer la opción para devolver la respuesta como una cadena
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Cerrar cURL
    curl_close($ch);

    // Devolver la respuesta
    return $response;
}