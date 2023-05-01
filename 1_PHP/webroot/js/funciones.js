// Almacenar la URL actual en una cookie antes de navegar a otra página
document.cookie = "previousUrl=" + encodeURIComponent(window.location.href) + ";path=/";

// Función para obtener el valor de una cookie
function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

// Manejar el evento del botón "volver"
document.querySelectorAll(".volver").forEach(function (btn) {
    btn.addEventListener("click", function () {
        var oldURL = decodeURIComponent(getCookie("previousUrl"));
        if (oldURL) {
            window.location.href = oldURL;
        } else {
            window.history.back();
        }
    });
});


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


//Cuando pulsamos Editar perfil, la información del usuario se vuelve editable.
const campos = document.querySelectorAll('.campo-perfil');
const btnEditar = document.querySelector('#editarPerfil');

function editarPerfil() {
  campos.forEach(campo => {
    campo.readOnly = !campo.readOnly;
  });
  btnEditar.style.display = btnEditar.style.display === 'none' ? 'block' : 'none';
}

//Para elegir crear o proyecto o producto nuevo
const tipoSelect = document.getElementById("tipo");
  const productoDiv = document.querySelector(".producto");
  const proyectoDiv = document.querySelector(".proyecto");

tipoSelect.addEventListener("change", function (event) {
  const selectedOption = event.target.value;

  if (selectedOption === "producto") {
    productoDiv.style.display = "block";
    proyectoDiv.style.display = "none";
  } else if (selectedOption === "proyecto") {
    productoDiv.style.display = "none";
    proyectoDiv.style.display = "block";
  }
});

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

