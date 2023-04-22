<div class="fondo">
    <div class="position-fixed bottom-0 end-0">
        <img src="webroot/recursos/fondo/Capa4.png" alt="mancha">
    </div>
    <div class="position-fixed bottom-0 start-0">
        <img src="webroot/recursos/fondo/Capa5.png">
    </div>
    <form action="./index.php" method="post">
        <input type="submit" class="volver btn-back pt-sm-5 pt-lg-0" name="volver" id="volver" value="Atrás">
        <!-- <a href="" class="btn-back pt-sm-5 pt-lg-0" name="volver">
            <i class="bi bi-chevron-left"></i>
        </a> -->
        <div class="d-flex align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <!-- Formulario -->
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title text-center">Formulario de contacto</h3>
                                <p class="text-center mb-4">Si quieres contratar algón servicio no dudes en contactar conmigo!</p>
                                <div class="form-group mb-3">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mensaje">Mensaje:</label>
                                    <textarea class="form-control" id="mensaje" rows="5" placeholder="Ingresa tu mensaje"></textarea>
                                </div>
                                <input type="submit" value="Enviar" name="enviar" class="btn btn-primary float-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>