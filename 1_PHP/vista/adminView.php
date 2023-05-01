<div class="product">
  <section class="py-5 text-center container">
    <div class="row pt-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="d-flex justify-content-center">
          <button class="volver btn-outline-primary d-flex align-items-center" name="volver" id="volver1">
            <i class="flechaVolver bi bi-arrow-left-circle"></i>
          </button>
          <h1 class="text-light">Admin</h1>
        </div>
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
  </section>
</div>

<section id="perfil">
  <form action="./index.php" method="post">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="./webroot/recursos/perfil/perfil2.png" alt="avatar" class="rounded-circle img-fluid" style="width: 120px;">
              <h2 class="my-3"><? echo $_SESSION['nombre_usuario']; ?></h2>
              <?php if (isset($_REQUEST['editarPerfil'])) : ?>
                <div class="d-flex justify-content-center align-items-center mb-2">
                  <button type="submit" class="btn btn-lg btn-block btn-primary" id="guardarCambios" name="guardarCambios">Guardar cambios</button>
                  <button type="submit" class="btn btn-lg btn-block btn-primary ms-1" onclick="location.reload()">Cancelar</button>
                </div>
              <?php else : ?>
                <div class="d-flex justify-content-center align-items-center mb-2">
                  <button type="submit" class="btn btn-lg btn-block btn-primary" name="editarPerfil" id="editarPerfil" onclick="editarPerfil()">Editar perfíl</button>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <div class="datosUser col-lg-8">
            <input type="hidden" name="id_usuario" value="<? echo $_SESSION['id_usuario']; ?>">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nombre</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_POST['editarPerfil'])) : ?>
                      <input type="text" class="form-control campo-perfil" name="nombrePerfil" value="<? echo $_SESSION['nombre_usuario']; ?>">
                    <?php else : ?>
                      <p class="text-muted mb-0"><? echo $_SESSION['nombre_usuario']; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Teléfono</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_POST['editarPerfil'])) : ?>
                      <input type="number" class="form-control campo-perfil" name="telefonoPerfil" value="<? echo $_SESSION['telefono_usuario']; ?>">
                    <?php else : ?>
                      <p class="text-muted mb-0"><? echo $_SESSION['telefono_usuario']; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_POST['editarPerfil'])) : ?>
                      <input type="email" class="form-control campo-perfil" name="emailPerfil" value="<? echo $_SESSION['email_usuario']; ?>">
                    <?php else : ?>
                      <p class="text-muted mb-0"><? echo $_SESSION['email_usuario']; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contraseña</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_POST['editarPerfil'])) : ?>
                      <input type="password" class="form-control campo-perfil" name="contraseñaPerfil" value="<? echo $_SESSION['contrasena_usuario']; ?>">
                    <?php else : ?>
                      <p class="text-muted mb-0"><? echo $_SESSION['contrasena_usuario']; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>

<section id="gestor" style="display: none;">
  <div class="d-flex justify-content-end me-5 my-3">
    <form action="./index.php" method="post">
      <input type="submit" class="new btn btn-primary my-3 ml-3" name="nuevoProyecto" id="nuevoProyecto" value="Nuevo proyecto">
    </form>
  </div>
  <div class="table-responsive" style="text-align: center;">
    <table class="table table-striped text-success table-bordered border-light">
      <thead class="border-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col"><strong>Proyecto</strong></th>
          <th scope="col"><strong>Fecha</strong></th>
          <th scope="col"><strong>Cliente</strong></th>
          <th scope="col"><strong>Factura</strong></th>
          <th scope="col"><strong>-</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($array_proyectos)) : ?>
          <?php foreach ($array_proyectos as $proyecto) : ?>
            <tr>
              <th scope="row"><?php echo $proyecto->id_proyecto ?></th>
              <td><?php echo $proyecto->nombre_proyecto ?></td>
              <td><?php echo $proyecto->fecha_proyecto ?></td>
              <td><?php echo $proyecto->usuario_id ?></td>
              <td><a href="<?php echo $proyecto->factura_id ?>">Ver factura</a></td>
              <td>
                <button class="btn btn-primary mb-1" name="editar"><i class="bi bi-pencil-square me-2"></i>Editar</button>
                <button class="btn btn-primary mb-1" name="archivos"><i class="bi bi-file-earmark me-2"></i>Archivos</button>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else : ?>
          <tr>
            <td colspan="6">No hay proyectos disponibles.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<section id="chat" style="display: none;">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Clientes</h5>
        <div class="card">
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li class="my-2">
                <div class="container">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <img src="https://via.placeholder.com/150" alt="Imagen de ejemplo" class="rounded-circle" width="50">
                      <span class="ms-3 fw-bold" style="font-size: 17px;">John Doe</span>
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cliente1" aria-expanded="false">Editar</button>
                      <button class="btn btn-toggle align-items-center rounded collapsed">Borrar</button>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="cliente1">
                  <div class="container mt-4">
                    <form>
                      <div class="mb-2">
                        <input type="text" class="form-control" id="username" placeholder="Nombre de usuario">
                      </div>
                      <div class="mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme su contraseña">
                      </div>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-toggle align-items-center rounded collapsed">Guardar cambios</button>
                        <button class="btn btn-toggle align-items-center rounded collapsed">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
              <li class="my-2">
                <div class="container">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <img src="https://via.placeholder.com/150" alt="Imagen de ejemplo" class="rounded-circle" width="50">
                      <span class="ms-3 fw-bold" style="font-size: 17px;">John Doe</span>
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cliente2" aria-expanded="false">Editar</button>
                      <button class="btn btn-toggle align-items-center rounded collapsed">Borrar</button>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="cliente2">
                  <div class="container mt-4">
                    <form>
                      <div class="mb-2">
                        <input type="text" class="form-control" id="username" placeholder="Nombre de usuario">
                      </div>
                      <div class="mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme su contraseña">
                      </div>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-toggle align-items-center rounded collapsed">Guardar cambios</button>
                        <button class="btn btn-toggle align-items-center rounded collapsed">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
              <li class="my-2">
                <div class="container">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <img src="https://via.placeholder.com/150" alt="Imagen de ejemplo" class="rounded-circle" width="50">
                      <span class="ms-3 fw-bold" style="font-size: 17px;">John Doe</span>
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cliente3" aria-expanded="false">Editar</button>
                      <button class="btn btn-toggle align-items-center rounded collapsed">Borrar</button>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="cliente3">
                  <div class="container mt-4">
                    <form>
                      <div class="mb-2">
                        <input type="text" class="form-control" id="username" placeholder="Nombre de usuario">
                      </div>
                      <div class="mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                      </div>
                      <div class="mb-2">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme su contraseña">
                      </div>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-toggle align-items-center rounded collapsed">Guardar cambios</button>
                        <button class="btn btn-toggle align-items-center rounded collapsed">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
            </ul>
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
              <input type="submit" class="btn btn-primary" name="enviarMensajesUser" id="enviarMensajesUser"><i class="bi bi-send me-2"></i>Enviar</input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>