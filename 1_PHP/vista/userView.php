<div class="product">
  <section class="py-5 text-center container">
    <form action="./index.php" method="post">
      <a href="" class="btn-back pt-sm-5 pt-lg-0" name="volver">
        <i class="bi bi-chevron-left"></i>
      </a>
    </form>
    <div class="row pt-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="text-light">Usuario<? //echo $_SESSION['nombre_usuario']; 
                                      ?></h1>
        <a class="privadas" href="#" data-target="perfil">
          <i class="bi bi-person-gear"></i>
          <span>Perfil</span>
        </a>
        <a class="privadas" href="#" data-target="gestor">
          <i class="bi bi-gear"></i>
          <span>Proyectos</span>
        </a>
        <a class="privadas" href="#" data-target="chat">
          <i class="bi bi-chat-dots"></i>
          <span>Chat</span>
        </a>
      </div>
    </div>
    <p class="intro text-center justify-text">
      Bienvenido/a a tu área privada <? //echo $_SESSION["nombre_usuario"]; 
                                      ?>, donde encontrarás todo lo que necesitas para mantener tus proyectos y comunicarte con el diseñador a cargo.
      <br>Aquí encontrarás tu perfil, todos tus proyectos y un chat donde podrás contactarme directamente.
      <br>¡Explora y disfruta de tu experiencia!
    </p>
  </section>
</div>

<section id="perfil">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" alt="avatar" class="rounded-circle img-fluid" style="width: 120px;">
            <h5 class="my-3">John Smith</h5>
            <div class="d-flex justify-content-center mb-2">
              <? if (isset($_REQUEST['editar'])) {
                echo '<button type="button" class="btn btn-outline-primary ms-1">Guardar</button>';
                echo '<button type="button" class="btn btn-outline-primary ms-1">Cancelar</button>';
              } else {
              ?>
                <button type="button" class="btn btn-primary">Editar perfíl</button>
              <? } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Johnatan Smith</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teléfono</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contraseña</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">*********</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gestor" style="display: none;">
  <div class="table-responsive" style="text-align: center;">
    <table class="table table-striped text-successtable-border border-light">
      <thead class="border-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col"><strong>Proyecto</strong></th>
          <th scope="col"><strong>Fecha</strong></th>
          <th scope="col"><strong>Factura</strong></th>
          <th scope="col"><strong>-</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row"> 2</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<section id="chat" style="display: none;">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body text-center">
            <div class="list-unstyled ">
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted">Bay Area, San Francisco, CA</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-7 col-xl-8">
        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Chat</h5>
        <div class="chat-container d-flex flex-column" style="min-height: 400px;">
          <form form action="./index.php" method="post">
            <ul class="list-unstyled">
              <?php foreach ($messages as $message) : ?>
                <?php if ($message->usuario_nombre === 'Lulú') : ?>
                  <li class="d-flex justify-content-between mb-4">
                    <div class="card w-100">
                      <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0"><?php echo $message->usuario_nombre ?></p>
                      </div>
                      <div class="card-body">
                        <p class="mb-0"><?php echo $message->descripcion_mensaje ?></p>
                      </div>
                    </div>
                    <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                  </li>
                <?php else : ?>
                  <li class="d-flex justify-content-between mb-4">
                    <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                    <div class="card w-100">
                      <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0"><?php echo $message->usuario_nombre ?></p>
                      </div>
                      <div class="card-body">
                        <p class="mb-0">
                          <?php echo $message->descripcion_mensaje ?>
                        </p>
                      </div>
                    </div>
                  </li>
                <?php endif; ?>
                <input type="hidden" name="usuario_id" value="<?php echo $message->usuario_nombre ?>">
              <?php endforeach; ?>
            </ul>
            <div class="input-group">
              <input type="text" class="form-control" name="descripcion_mensaje" placeholder="Escribe un mensaje...">
              <input type="hidden" name="usuario_id" value="<?php echo $message->usuario_nombre ?>">
              <button class="btn btn-primary" type="submit" name="enviarMensajesUser" id="enviarMensajesUser"><i class="bi bi-send me-2"></i>Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>