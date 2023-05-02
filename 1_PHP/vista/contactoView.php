<div class="fondo">
    <div class="position-fixed bottom-0 end-0">
        <img src="webroot/recursos/fondo/Capa4.png" alt="mancha">
    </div>
    <div class="position-fixed bottom-0 start-0">
        <img src="webroot/recursos/fondo/Capa5.png">
    </div>
    <form id="contactForm" method="post">
        <div class="d-flex align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <!-- Formulario -->
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="volver btn-outline-primary d-flex align-items-center" onclick="window.history.back();">
                                        <i class="flechaVolver bi bi-arrow-left-circle text-black"></i>
                                    </button>
                                    <h3 class="card-title text-center">Formulario de contacto</h3>
                                </div>
                                <p class="text-center mb-4">Si quieres contratar algón servicio no dudes en contactar conmigo!</p>
                                <div class="form-group mb-3">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreContacto" name="nombreContacto" placeholder="Ingrese su nombre">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control" id="telefonoContacto" name="telefonoContacto" placeholder="Ingrese su teléfono">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="emailContacto" name="emailContacto" placeholder="Ingrese su correo electrónico">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mensaje">Mensaje:</label>
                                    <textarea class="form-control" id="mensajeContacto" name="mensajeContacto" rows="5" placeholder="Ingrese su mensaje"></textarea>
                                </div>
                                <input type="submit" value="Enviar" name="enviarContacto" class="btn btn-primary float-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="modalAviso" tabindex="-1" aria-labelledby="modalAvisoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAvisoLabel">Aviso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalAvisoMensaje"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>