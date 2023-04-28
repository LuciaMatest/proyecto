// Pantalla de carga
//Se mostrará el gif durante 2,6 segundos antes de mostrar la pagina principal de la web
setTimeout(function() {
  // Oculta la pantalla de carga
  document.querySelector('.loader').style.display = 'none';
  // Muestra el contenido de la página
  document.querySelector('.contenido-pagina').style.display = 'block';
}, 2600);

//Navegador de circulos
//Cuando se pulse en uno de los botones este se hará más pequeño que los demás mientras se encuentre en esa sección
const botones = document.querySelectorAll('.circle');

botones.forEach(boton => {
  boton.addEventListener('click', () => {
    botones.forEach(boton => {
      boton.classList.remove('activo');
      boton.style.transform = 'scale(1)';
    });

    boton.classList.add('activo');
    boton.style.transform = 'scale(0.8)';
  });
});

//Categorias
//Cuando se pulse en una de las categorias cada una mostrara el div correspondiente
const disenosDiv = document.getElementById('disenos');
const ilustracionesDiv = document.getElementById('ilustraciones');
const webDiv = document.getElementById('web');

const categorias = document.querySelectorAll('.categorias');

categorias.forEach((categoria) => {
  categoria.addEventListener('click', (evento) => {
    const target = evento.currentTarget.getAttribute('data-target');

    disenosDiv.style.display = 'none';
    ilustracionesDiv.style.display = 'none';
    webDiv.style.display = 'none';

    disenosDiv.classList.add("oculto");
    ilustracionesDiv.classList.add("oculto");
    webDiv.classList.add("oculto");

    const divToShow = document.querySelector(`#${target}`);
    divToShow.style.display = 'block';
    categorias.classList.remove("oculto");
  });
});

//Área privada
//Cuando se pulse en una de las areas cada una mostrara el div correspondiente
const perfilDiv = document.getElementById('perfil');
const gestorDiv = document.getElementById('gestor');
const chatDiv = document.getElementById('chat');

const privadas = document.querySelectorAll('.privadas');

privadas.forEach((categoria) => {
  categoria.addEventListener('click', (evento) => {
    const target = evento.currentTarget.getAttribute('data-target');

    perfilDiv.style.display = 'none';
    gestorDiv.style.display = 'none';
    chatDiv.style.display = 'none';

    perfilDiv.classList.add("oculto");
    gestorDiv.classList.add("oculto");
    chatDiv.classList.add("oculto");

    const divToShow = document.querySelector(`#${target}`);
    divToShow.style.display = 'block';
    privadas.classList.remove("oculto");
  });
});

//Login - Sign in
//Cuando pulsemos el boton de loguearse aparecera una ventana emergente con un boton para cerrarlo
const formBtn = document.getElementById("login");
const formContainer = document.querySelector(".form-container");
const header = document.getElementById("headerNav");
const closeBtn = document.getElementById('closeBtn');

// Cuando se pulse el botón de login se abrirá
formBtn.addEventListener("click", () => {
  formContainer.style.display = "flex";
  header.style.display = "none";
});

// Cuando se pulse el botón X se cerrará
closeBtn.addEventListener('click', function() {
  formContainer.style.display = 'none';
  header.style.display = 'block';
  closeBtn.removeEventListener('click');
});


$(document).ready(function () {
  // Carga los mensajes al cargar la página
  fetchMessages();

  // Envía el formulario y recarga los mensajes
  $('#message-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: './index.php',
      data: $(this).serialize(),
      success: function () {
        fetchMessages();
      },
    });
  });
});

function fetchMessages() {
  $.ajax({
    type: 'GET',
    url: 'fetch_messages.php',
    dataType: 'json',
    success: function (messages) {
      renderMessages(messages);
    },
  });
}

function renderMessages(messages) {
  var messageList = $('#messages-container');
  messageList.empty();

  messages.forEach(function (message) {
    if (message.usuario_nombre === 'Lulú') {
      messageList.append(`
        <li class="d-flex justify-content-between mb-4">
          <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
          <div class="card w-100">
            <div class="card-header d-flex justify-content-between p-3">
              <p class="fw-bold mb-0">\${message.usuario_nombre}</p>
            </div>
            <div class="card-body">
              <p class="mb-0">\${message.descripcion_mensaje}</p>
            </div>
          </div>
        </li>
      `)
    } else {
      messageList.append(`
        <li class="d-flex justify-content-between mb-4">
          <div class="card w-100">
            <div class="card-header d-flex justify-content-between p-3">
              <p class="fw-bold mb-0">\${message.usuario_nombre}</p>
            </div>
            <div class="card-body">
              <p class="mb-0">\${message.descripcion_mensaje}</p>
            </div>
          </div>
          <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
        </li>
      `);
    }
  });
}