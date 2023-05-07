<div class="fondo">
    <div class="position-fixed bottom-0 end-0">
        <img src="webroot/recursos/fondo/Capa4.png" alt="mancha">
    </div>
    <div class="position-fixed bottom-0 start-0">
        <img src="webroot/recursos/fondo/Capa5.png">
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <!-- Formulario -->
                    <div id="formContact" class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <form action="./index.php" method="post">
                                    <button type="submit" class="volver volverAtras btn-outline-primary d-flex align-items-center" name="volverAtras">
                                        <i class="flechaVolver bi bi-arrow-left-circle text-black"></i>
                                    </button>
                                </form>
                                <h3 class="card-title text-center">Formulario de contacto</h3>
                            </div>
                            <p class="text-center mb-4">Si quieres contratar algún servicio no dudes en contactar conmigo!</p>
                            <div id="formulario">
                                <form id="contactForm" method="post">
                                    <div class="form-group mb-3">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombreContacto" name="nombreContacto">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Correo electrónico:</label>
                                        <input type="email" class="form-control" id="emailContacto" name="emailContacto">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="telefono">Asunto:</label>
                                        <input type="text" class="form-control" id="asuntoContacto" name="asuntoContacto">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="mensaje">Mensaje:</label>
                                        <textarea class="form-control" id="mensajeContacto" name="mensajeContacto" rows="5"></textarea>
                                    </div>
                                    <div>
                                        <?php
                                        if (isset($_SESSION['success'])) {
                                            echo '<script>alert(\'' . $_SESSION['success'] . '\');</script>';
                                            unset($_SESSION['success']);
                                        }

                                        if (isset($_SESSION['error'])) {
                                            echo '<script>alert(\'' . $_SESSION['error'] . '\');</script>';
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                                        <button type="submit" id="enviarContacto" name="enviarContacto" class="btn btn-primary float-end">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>