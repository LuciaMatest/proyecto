<?php
if (isset($_REQUEST['volver'])) {
    // Almacenar la URL actual en una variable de sesión
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    // Redirigir al usuario a una nueva página
    header('Location: ./index.php');
}
