$(document).ready(function () {
  $("#contactForm").submit(function (event) {
    // Evita que el formulario se envíe de la forma predeterminada
      event.preventDefault();

      let nombre = $("#nombreContacto").val();
      let telefono = $("#telefonoContacto").val();
      let email = $("#emailContacto").val();
      let mensaje = $("#mensajeContacto").val();

      $.ajax({
          type: "POST",
          url: "./controlador/ContactoController.php",
          data: {
              nombreContacto: nombre,
              telefonoContacto: telefono,
              emailContacto: email,
              mensajeContacto: mensaje
          },
          success: function (response) {
            // Muestra una alerta con la respuesta del servidor
              alert(response); 
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("Error al enviar el mensaje: " + textStatus + " " + errorThrown);
          }
      });
  });
});
