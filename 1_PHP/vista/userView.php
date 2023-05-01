<div class="product">
  <section class="py-5 text-center container">
    <div class="row pt-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="d-flex justify-content-center">
          <button class="volver btn-outline-primary d-flex align-items-center" name="volver" id="volver6">
            <i class="flechaVolver bi bi-arrow-left-circle"></i>
          </button>
          <h1 class="text-light">
            <?php
            if (isset($_SESSION['nombre_usuario'])) {
              echo $_SESSION['nombre_usuario'];
            } else {
              echo "Nombre de usuario no disponible";
            }
            ?>
          </h1>
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
    <p class="intro text-center justify-text">
      Bienvenido/a a tu área privada <? echo $_SESSION['nombre_usuario']; ?>, donde encontrarás todo lo que necesitas para mantener tus proyectos y comunicarte con el diseñador a cargo.
      <br>Aquí encontrarás tu perfil, todos tus proyectos y un chat donde podrás contactarme directamente.
      <br>¡Explora y disfruta de tu experiencia!
    </p>
  </section>
</div>

<section id="perfil">
  <form action="./index.php" method="post">
    <input type="hidden" name="id_usuario" value="<? echo $_SESSION['id_usuario']; ?>">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="./webroot/recursos/perfil/perfil.png" alt="avatar" class="rounded-circle img-fluid" style="width: 120px;">
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
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nombre</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_REQUEST['editarPerfil'])) : ?>
                      <input type="text" class="form-control campo-perfil" name="nombre" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                                  echo $usuario->nombre_usuario;
                                                                                                } ?>">
                      <?
                      if (isset($_REQUEST['guardarCambios'])) {
                        if (vacio("nombre")) {
                      ?>
                          <span style="color:brown"> Introduce nombre</span>
                      <?
                        }
                      }
                      ?>
                    <?php else : ?>
                      <input type="text" class="dato text-muted mb-0" name="nombre" value="<?php echo $_SESSION['nombre_usuario']; ?>" readonly>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Teléfono</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_REQUEST['editarPerfil'])) : ?>
                      <input type="number" class="form-control campo-perfil" name="telefono" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                                      echo $usuario->telefono_usuario;
                                                                                                    } ?>">
                      <?
                      if (isset($_REQUEST['guardarCambios'])) {
                        if (vacio("telefono")) {
                      ?>
                          <span style="color:brown"> Introduce teléfono</span>
                        <?
                        } elseif (!patronTelefono()) {
                        ?>
                          <span style="color:brown"> Teléfono no válida, revise</span>
                      <?
                        }
                      }
                      ?>
                    <?php else : ?>
                      <input type="text" class="dato text-muted mb-0" name="telefono" value="<?php echo $_SESSION['telefono_usuario']; ?>" readonly>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_REQUEST['editarPerfil'])) : ?>
                      <input type="email" class="form-control campo-perfil" name="email" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                                  echo $usuario->email_usuario;
                                                                                                } ?>">
                      <?
                      if (isset($_REQUEST['guardarCambios'])) {
                        if (vacio("email")) {
                      ?>
                          <span style="color:brown"> Introduce correo</span>
                        <?
                        } elseif (!patronEmail()) {
                        ?>
                          <span style="color:brown"> Correo no válida, revise</span>
                      <?
                        }
                      }
                      ?>
                    <?php else : ?>
                      <input type="email" class="dato text-muted mb-0" name="email" value="<?php echo $_SESSION['email_usuario']; ?>" readonly>
                    <?php endif; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contraseña</p>
                  </div>
                  <div class="col-sm-9">
                    <?php if (isset($_REQUEST['editarPerfil'])) : ?>
                      <input type="text" class="form-control campo-perfil" name="contraseña" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                                      echo $usuario->contrasena_usuario;
                                                                                                    } ?>">
                      <?
                      if (isset($_REQUEST['guardarCambios'])) {
                        if (vacio("contraseña")) {
                      ?>
                          <span style="color:brown"> Introduce contraseña</span>
                        <?
                        } elseif (!patronContraseña()) {
                        ?>
                          <span style="color:brown"> Contraseña no válida, revise</span>
                      <?
                        }
                      }
                      ?>
                    <?php else : ?>
                      <input type="password" class="dato text-muted mb-0" name="contraseña" value="<?php echo $usuario->contrasena_usuario; ?>" readonly>
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
  <div class="table-responsive" style="text-align: center;">
    <table class="table table-striped text-success table-bordered border-light mt-5">
      <thead class="border-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col"><strong>Proyecto</strong></th>
          <th scope="col"><strong>Fecha</strong></th>
          <th scope="col"><strong>Factura</strong></th>
          <th scope="col"><strong>Acciones</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($array_proyectos)) : ?>
          <?php foreach ($array_proyectos as $proyecto) : ?>
            <tr>
              <th scope="row"><?php echo $proyecto->id_proyecto ?></th>
              <td><?php echo $proyecto->nombre_proyecto ?></td>
              <td><?php echo $proyecto->fecha_proyecto ?></td>
              <td><a href="<?php echo $proyecto->factura_id ?>">Ver factura</a></td>
              <td>
                <button class="btn btn-primary mb-1">Mostrar archivos</button>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else : ?>
          <tr>
            <td colspan="5">No hay proyectos disponibles.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
    <input type="hidden" name="id_usuario" value="<? echo $_SESSION['id_usuario']; ?>">
  </div>
</section>

<section id="chat" style="display: none;">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body text-center">
            <div class="list-unstyled">
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">Lucía Mateos</h5>
              <p class="text-muted mb-1">Ilustradora, diseñadora y desarrolladora web</p>
              <p class="text-muted">L-V 9:00-14:00/17:00-20:00 <br> S-D 9:00-14:00</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-7 col-xl-8">
        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Chat</h5>
        <div class="chat-container d-flex flex-column" style="min-height: 400px;">
          <form action="./index.php" method="post">
            <?php
            require_once('./config/conexion.php');
            // Transacción
            try {
              $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, BBDD);
              $sql = 'SELECT mensaje.*, usuario.nombre_usuario FROM mensaje JOIN usuario ON mensaje.id_usuario_envia = usuario.id_usuario ORDER BY fecha_mensaje ASC;';
              $resultado = mysqli_query($conexion, $sql);
              // Mostrar mensajes
              if ($resultado->num_rows > 0) {
                echo '<ul class="list-unstyled">';
                while ($message = $resultado->fetch_object()) {
                  $nombreUsuario = $message->nombre_usuario;
                  if ($message->id_usuario_envia === 1) {
                    echo '<li class="d-flex justify-content-between mb-4">
                      <div class="card w-100">
                        <div class="card-header d-flex justify-content-between p-3">
                          <p class="fw-bold mb-0">' . $nombreUsuario . '</p>
                        </div>
                        <div class="card-body">
                          <p class="mb-0">' . $message->descripcion_mensaje . '</p>
                        </div>
                      </div>
                      <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                    </li>';
                  } else {
                    echo '<li class="d-flex justify-content-between mb-4">
                      <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                      <div class="card w-100">
                        <div class="card-header d-flex justify-content-between p-3">
                          <p class="fw-bold mb-0">' . $nombreUsuario . '</p>
                        </div>
                        <div class="card-body">
                          <p class="mb-0">' . $message->descripcion_mensaje . '</p>
                        </div>
                      </div>
                    </li>';
                  }
                }
                echo '</ul>';
              } else {
                echo "<p>No hay mensajes.</p>";
              }
              // Cerrar conexión
              mysqli_close($conexion);
            } catch (Exception $ex) {
              if ($ex->getCode() == 2002) {
                echo '<span style="color:brown"> Fallo de conexión </span>';
              }
              if ($ex->getCode() == 1049) {
                echo '<span style="color:brown"> Base de datos desconocida </span>';
              }
              if ($ex->getCode() == 1045) {
                echo '<span style="color:brown"> Datos incorrectos </span>';
              }
            }
            ?>
            <div class="input-group">
              <input type="text" class="form-control" id="messageInput" name="descripcion_mensaje" placeholder="Escribe un mensaje...">
              <input type="submit" class="btn btn-primary" id="sendMessageBtn" name="enviarMensajesUser" value="Enviar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>