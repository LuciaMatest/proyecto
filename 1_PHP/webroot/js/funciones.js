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
const disenosDiv = document.getElementById('Diseño');
const ilustracionesDiv = document.getElementById('Ilustraciones');
const webDiv = document.getElementById('Web');

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


$(document).ready(function() {
  $("#contactForm").on("submit", function(e) {
    e.preventDefault();

    // Recopilar los datos del formulario
    var nombre = $("#nombreContacto").val();
    var email = $("#emailContacto").val();
    var mensaje = $("#mensajeContacto").val();

    // Preparar los datos para AJAX
    var data = {
      nombreContacto: nombre,
      emailContacto: email,
      mensajeContacto: mensaje
    };

    // Enviar los datos utilizando AJAX
    $.ajax({
      type: "POST",
      url: "ruta/al/archivo/servidor.php", // Cambiar esta ruta al archivo de tu servidor que procesará los datos del formulario
      data: data,
      success: function(response) {
        // Manejar la respuesta del servidor
        alert("Mensaje enviado con éxito");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Manejar errores
        alert("Error al enviar el mensaje");
      }
    });
  });
});

