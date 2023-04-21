<div class="product">
  <section class="py-5 text-center container">
    <form>
      <!-- BOTÓN VOLVER -->
    </form>
    <div class="row pt-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="text-light">Admin</h1>
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
                <button type="button" class="btn btn-primary">Editar</button>
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
  <div class="d-flex justify-content-start">
    <button class="new btn btn-primary my-3 ml-3" name="nuevoProyecto">Nuevo proyecto</button>
  </div>
  <div class="table-responsive" style="text-align: center;">
    <table class="table table-striped text-successtable-border border-light">
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
        <tr>
          <th scope="row">1</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td>Pepe</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1" name="editar"><i class="bi bi-pencil-square me-2"></i>Editar</button>
            <button class="btn btn-primary mb-1" name="archivos"><i class="bi bi-file-earmark me-2"></i>Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row"> 2</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td>Pepe</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Editar</button>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td>Pepe</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Editar</button>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Ilustración familiar</td>
          <td>20/04/2023</td>
          <td>Pepe</td>
          <td><a href="#">enlace</a></td>
          <td>
            <button class="btn btn-primary mb-1">Editar</button>
            <button class="btn btn-primary mb-1">Archivos</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
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
          <ul class="list-unstyled">
            <li class="d-flex justify-content-between mb-4">
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
              <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">John Doe</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex justify-content-between mb-4">
              <div class="card w-100">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">Lulú</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium.
                  </p>
                </div>
              </div>
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
            </li>
            <li class="d-flex justify-content-between mb-4">
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
              <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">John Doe</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex justify-content-between mb-4">
              <div class="card w-100">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">Lulú</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium.
                  </p>
                </div>
              </div>
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
            </li>
            <li class="d-flex justify-content-between mb-4">
              <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
              <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">John Doe</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                  </p>
                </div>
              </div>
            </li>
          </ul>
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Escribe un mensaje...">
              <button class="btn btn-primary" type="submit"><i class="bi bi-send me-2"></i>Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section>