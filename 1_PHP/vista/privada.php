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

