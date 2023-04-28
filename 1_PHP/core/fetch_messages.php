<?php
require_once './1_PHP/config/conexion.php'; 

$sql = "SELECT * FROM mensaje ORDER BY fecha_mensaje ASC";
$result = $conn->query($sql);
$messages = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
?>
