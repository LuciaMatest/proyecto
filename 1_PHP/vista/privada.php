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