//Chat
let intervalId;

function cargarMensajesUsuario(userId) {
    // Limpiar intervalo anterior en caso de que exista
    clearInterval(intervalId); 
    intervalId = setInterval(function() {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'adminView.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          actualizarChatbox(xhr.responseText);
        }
      };
      xhr.send('verChat=' + userId);
    }, 1000);
}

function actualizarChatbox(nuevos_mensajes) {
    const chatbox = document.getElementById('chatbox');
    chatbox.insertAdjacentHTML('beforeend', nuevos_mensajes);
  }
  
document.getElementById('myForm').addEventListener('submit', function(event) {
  event.preventDefault();

  const messageInput = document.getElementById('messageInput');
  const message = messageInput.value;
  // Limpiar el campo de texto
  messageInput.value = '';

  // Crear FormData para enviar el mensaje
  const formData = new FormData();
  formData.append('descripcion_mensaje', message);

  // Cambia 'your_server_endpoint' por la URL del servidor donde deseas enviar el mensaje
  const url = 'your_server_endpoint';

  // Lógica para enviar el mensaje al servidor usando Fetch API
  fetch(url, {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    console.log('Mensaje enviado:', data);
  })
  .catch(error => {
    console.error('Error enviando el mensaje:', error);
  });
});
