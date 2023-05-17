//Cuando realicemos una edicion de perfil, los input no editables pasan a ser editables.
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

//Para que controlar el error cuando damos para atras desde el navegador
window.location.hash = "no-back-button";
window.location.hash = "Again-No-back-button";
window.onchange = function () {
  window.location.hash = "no-back-button";
};

window.addEventListener('popstate', function (event) {
  window.location.hash = 'no-back-button';
});

//Cuando le demos click al boton de enviar mensaje se nos guardará el mensaje que escribimos en el input del chat para poder enviarlo posteriormente
  $(document).ready(function()
  {
    $('.formulario .linkarrow').click(function()
    {
      $(this).parents('form').submit();
    });

    $('.formulario form').submit(function(evento)
    {
      evento.preventDefault();

      var formulario = $(this);

      var datos = new FormData(formulario[0]);

      $.ajax({
        url:      formulario.attr('action'),
        cache:      false,
        data:       datos,
        type:       'post',
        dataType:     'json',
        contentType:  false,
        processData:  false
      })
      .done(function(respuesta)
      {
        destruir_cargando();

        var correcto  = respuesta.correcto;
        var titulo    = $('.h1_pag').text();
        var descripcion = respuesta.mensaje;

        $('.dialog').html(descripcion);
        $('.dialog').dialog({
          closeText: texto_cerrar,
          title: titulo,
          modal: true,
          draggable: false,
          show: 'fade',
          hide: 'fade',
          width: $(window).width() > 400 ? 400 : $(window).width() - 40,
          height: 'auto',
          maxWidth: 400,
          buttons: false
        });

        if (correcto)
          formulario.find('textarea').val('');
      });
    });
  });