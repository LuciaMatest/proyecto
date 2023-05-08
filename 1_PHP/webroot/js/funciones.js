// Pantalla de carga
// Se mostrará el gif durante 2,6 segundos antes de mostrar la pagina principal de la web
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(function () {
    // Oculta la pantalla de carga
    const loader = document.querySelector('.loader');
    if (loader) {
      loader.style.display = 'none';
    }

    // Muestra el contenido de la página
    const contenidoPagina = document.querySelector('.contenido-pagina');
    if (contenidoPagina) {
      contenidoPagina.style.display = 'block';
    }
  }, 2600);
});


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
    evento.preventDefault();
    const target = evento.currentTarget.getAttribute('data-target');

    disenosDiv.style.display = 'none';
    ilustracionesDiv.style.display = 'none';
    webDiv.style.display = 'none';

    disenosDiv.classList.add("oculto");
    ilustracionesDiv.classList.add("oculto");
    webDiv.classList.add("oculto");

    const divToShow = document.querySelector(`#${target}`);
    divToShow.style.display = 'block';
    categoria.classList.remove("oculto");
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
    evento.preventDefault();
    const target = evento.currentTarget.getAttribute('data-target');
    const divToShow = document.querySelector(`#${target}`);

    perfilDiv.style.display = 'none';
    gestorDiv.style.display = 'none';
    chatDiv.style.display = 'none';

    perfilDiv.classList.add("oculto");
    gestorDiv.classList.add("oculto");
    chatDiv.classList.add("oculto");

    divToShow.style.display = 'block';
    categoria.classList.remove("oculto");
  });
});

//Login - Sign in
//Cuando pulsemos el boton de loguearse aparecera una ventana emergente con un boton para cerrarlo
const formBtn = document.getElementById("login");
const formContainer = document.querySelector(".form-container");
const header = document.getElementById("headerNav");
const closeBtn = document.getElementById('closeBtn');

// Cuando se pulse el botón de login se abrirá
formBtn.addEventListener("click", (evento) => {
  evento.preventDefault();
  formContainer.style.display = "flex";
  header.style.display = "none";
});

// Cuando se pulse el botón X se cerrará
closeBtn.addEventListener('click', function (evento) {
  evento.preventDefault();
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
document.addEventListener("DOMContentLoaded", function () {
  if (window.location.href.includes("adminView.php")) {
    const tipoSelect = document.getElementById("tipo");
    const productoDiv = document.querySelector(".producto");
    const proyectoDiv = document.querySelector(".proyecto");

    tipoSelect.addEventListener("change", function (evento) {
      const selectedOption = evento.target.value;

      if (selectedOption === "producto") {
        productoDiv.style.display = "block";
        proyectoDiv.style.display = "none";
      } else if (selectedOption === "proyecto") {
        productoDiv.style.display = "none";
        proyectoDiv.style.display = "block";
      }
    });
  }
});


//Para elegir proyectos o productos
document.addEventListener("DOMContentLoaded", function () {
  if (window.location.href.includes("nuevoProView.php")) {
    const tablaSelect = document.getElementById("tablas");
    const productoTabla = document.querySelector(".tablaProducto");
    const proyectoTabla = document.querySelector(".tablaProyecto");

    tablaSelect.addEventListener("change", function (evento) {
      evento.preventDefault();
      const selectedOption = evento.target.value;

      if (selectedOption === "tablaProducto") {
        productoTabla.style.display = "block";
        proyectoTabla.style.display = "none";
      } else if (selectedOption === "tablaProyecto") {
        productoTabla.style.display = "none";
        proyectoTabla.style.display = "block";
      }
    });
  }
});