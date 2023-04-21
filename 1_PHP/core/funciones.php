<?php
function estaValidado()
{
    if (isset($_SESSION['validado'])) {
        return true;
    }
    return false;
}

function esAdmin()
{
    if (isset($_SESSION['tipo_usuario'])) {
        if ($_SESSION['tipo_usuario'] == 'admin')
            return true;
    }
    return false;
}

function esUsuario()
{
    if (isset($_SESSION['tipo_usuario'])) {
        if ($_SESSION['tipo_usuario'] == 'usuario')
            return true;
    }
    return false;
}

function vacio($nombre)
{
    if (empty($_REQUEST[$nombre])) {
        return true;
    }
    return false;
}

function existe($nombre)
{
    if (isset($_REQUEST[$nombre]))
        return true;
    return false;
}

function patronEmail()
{
    $patron = '/^[a-zA-Z0-9]+@(gmail|hotmail)\.(com|es)$/';
    if (preg_match($patron, $_REQUEST['email']) == 1) {
        return true;
    }
    return false;
}

function patronContraseña()
{
    $patron = '/^(?=.*[A-Za-z])(?=.*\d).+$/';
    if (preg_match($patron, $_REQUEST['contraseña']) == 1) {
        return true;
    }
    return false;
}

function patronTelefono()
{
    $patron = "/^[0-9]{9}$/";
    if (preg_match($patron, $_REQUEST['telefono']) == 1) {
        return true;
    }
    return false;
}

// function patronImagenAlta()
// {
//     $patron = '/^[^.]+\.(jpg|png|bmp)$/';
//     if (preg_match($patron, $_FILES['imagen_alta']['name']) == 1) {
//         return true;
//     }
//     return false;
// }

// function subirImagenAlta()
// {
//     $ruta = './webroot/imagen/producto/' . $_FILES['imagen_alta']['name'];
//     move_uploaded_file($_FILES['imagen_alta']['tmp_name'], $ruta);
// }


function validarNuevoUsuario()
{
    if (isset($_REQUEST['registrar'])) {
        if (!vacio('nombre')) {
            if (!vacio('telefono') && patronTelefono()) {
                if (!vacio('email') && patronEmail()) {
                    if (!vacio('contraseña') && !vacio('contraseña2') && patronContraseña() && $_REQUEST['contraseña'] == $_REQUEST['contraseña2']) {
                        return true;
                    }
                }
            }
        }
    } else {
        return false;
    }
}
