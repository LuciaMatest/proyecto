document.addEventListener("DOMContentLoaded", function () {
  // Llamada a la función editarPerfil
  editarPerfil();
});

function editarPerfil() {
  const camposPerfil = document.querySelectorAll('.campo-perfil');
  camposPerfil.forEach((campo) => {
    campo.removeAttribute('readonly');
  });
}

