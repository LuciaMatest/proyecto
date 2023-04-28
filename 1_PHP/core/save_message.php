<?php
require_once './1_PHP/config/conexion.php';

if (isset($_POST['enviarMensajesAdmin'])) {
  $descripcion_mensaje = $_POST['descripcion_mensaje'];
  $id_usuario_envia = $_POST['usuario_id'];
  $id_usuario_recibe = 1; // Aquí puedes asignar el ID del usuario que recibe el mensaje

  $sql = "INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) VALUES (?, NOW(), ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sii", $descripcion_mensaje, $id_usuario_envia, $id_usuario_recibe);

  if ($stmt->execute()) {
    echo "Mensaje enviado correctamente";
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>
