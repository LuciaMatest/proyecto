//Chat
function mostrarChat() {
  const button = document.getElementById('verChat');
  const idUsuario = button.getAttribute('data-id');
  const chatDiv = document.querySelector('.chat-container');

  // Realiza una solicitud AJAX para obtener los mensajes filtrados
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `./get_mensajes.php?id_usuario=\${idUsuario}`, true);
  xhr.onload = function() {
    if (this.status === 200) {
      chatDiv.innerHTML = this.responseText;
    }
  }
  xhr.send();
}

