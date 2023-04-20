<div class="">
    <section class="py-5 text-center container">
        <form>
            <button id="volver" class="btn-back pt-sm-5 pt-lg-0">
                <i class="bi bi-chevron-left"></i>
            </button>
        </form>
        <!-- <button type="button" class="btn-back pt-sm-5 pt-lg-0" onClick="window.history.back();">
            <i class="bi bi-chevron-left"></i>
        </button>
        <a href="#" onClick="window.history.go(-1); return false;" class="btn-back pt-sm-5 pt-lg-0">
            <i class="bi bi-chevron-left"></i>
        </a> -->
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="text-light"><? echo $_SESSION['nombre_usuario']; ?></h1>
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
        <?php
                if (esUsuario()) {
                    echo '<p class="intro text-center justify-text">
                    Bienvenido/a a tu área privada <? echo $_SESSION["nombre_usuario"]; ?>, donde encontrarás todo lo que necesitas para mantener tus proyectos y comunicarte con el diseñador a cargo.
                    <br>Aquí encontrarás tu perfil, todos tus proyectos y un chat donde podrás contactarme directamente.
                    <br>¡Explora y disfruta de tu experiencia!
                    </p>';
                }
                ?>
    </section>
</div>

<div class="">
    <section class="py-5 text-center container">
        <form>
            <button id="volver" class="btn-back pt-sm-5 pt-lg-0">
                <i class="bi bi-chevron-left"></i>
            </button>
        </form>
        <!-- <button type="button" class="btn-back pt-sm-5 pt-lg-0" onClick="window.history.back();">
            <i class="bi bi-chevron-left"></i>
        </button>
        <a href="#" onClick="window.history.go(-1); return false;" class="btn-back pt-sm-5 pt-lg-0">
            <i class="bi bi-chevron-left"></i>
        </a> -->
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="text-light"><? echo $_SESSION['nombre_usuario']; ?></h1>
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
        <?php
                if (esUsuario()) {
                    echo '<p class="intro text-center justify-text">
                    Bienvenido/a a tu área privada <? echo $_SESSION["nombre_usuario"]; ?>, donde encontrarás todo lo que necesitas para mantener tus proyectos y comunicarte con el diseñador a cargo.
                    <br>Aquí encontrarás tu perfil, todos tus proyectos y un chat donde podrás contactarme directamente.
                    <br>¡Explora y disfruta de tu experiencia!
                    </p>';
                }
                ?>
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
                } else{
              ?>
              <button type="button" class="btn btn-primary">Editar</button>
              <?}?>
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

<section id="gestor">
    <?php if (esAdmin()) { ?>
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
                        <button class="btn btn-primary mb-1" name="editar">Editar</button>
                        <button class="btn btn-primary mb-1" name="archivos">Archivos</button>
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
    <? } else {?>
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
    <? } ?>
  </div>
</section>

<section id="chat">
    <div class="container py-5">

    <div class="row">

      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Clientes</h5>

        <div class="card">
          <div class="card-body">

            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                <div class="d-flex flex-row">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                  <div class="pt-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                      John Doe
                    </button>
                  </div>
                </div>

                <div class="collapse" id="home-collapse" style="">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                    <li><a href="#" class="link-dark rounded">Updates</a></li>
                    <li><a href="#" class="link-dark rounded">Reports</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <div class="d-flex flex-row">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                  <div class="pt-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse2" aria-expanded="false">
                      John Doe
                    </button>
                  </div>
                </div>

                <div class="collapse" id="home-collapse2" style="">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                    <li><a href="#" class="link-dark rounded">Updates</a></li>
                    <li><a href="#" class="link-dark rounded">Reports</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-7 col-xl-8">
        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Chat</h5>
        <ul class="list-unstyled">
          <li class="d-flex justify-content-between mb-4">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
            <div class="card">
              <div class="card-header d-flex justify-content-between p-3">
                <p class="fw-bold mb-0">Brad Pitt</p>
                <p class="text-muted small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
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
                <p class="fw-bold mb-0">Lara Croft</p>
                <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
              </div>
              <div class="card-body">
                <p class="mb-0">
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                  laudantium.
                </p>
              </div>
            </div>
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
          </li>
          <li class="d-flex justify-content-between mb-4">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
            <div class="card">
              <div class="card-header d-flex justify-content-between p-3">
                <p class="fw-bold mb-0">Brad Pitt</p>
                <p class="text-muted small mb-0"><i class="far fa-clock"></i> 10 mins ago</p>
              </div>
              <div class="card-body">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.
                </p>
              </div>
            </div>
          </li>
          <form class="mt-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Escribe un mensaje...">
              <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
          </form>
        </ul>

      </div>

    </div>

  </div>
</section>