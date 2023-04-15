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

//Cuando se pulse en uno de los botones cambiaremos de categoria
// Obtenemos los elementos necesarios
const albumLinks = document.querySelectorAll('a[id^="album-"]');
const albums = document.querySelectorAll('.album');

// Función para mostrar un álbum y ocultar los demás
function showAlbum(albumId) {
  // Ocultamos todos los álbumes
  albums.forEach((album) => {
    album.classList.remove('active');
  });
  // Mostramos el álbum seleccionado
  const albumToShow = document.getElementById(albumId);
  albumToShow.classList.add('active');
}

// Agregamos un controlador de eventos a cada etiqueta "a" para mostrar el álbum correspondiente
albumLinks.forEach((albumLink) => {
  albumLink.addEventListener('click', (event) => {
    event.preventDefault();
    const albumId = event.target.getAttribute('id');
    showAlbum(albumId);
  });
});

// Mostramos el primer álbum por defecto
showAlbum('album-1');


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