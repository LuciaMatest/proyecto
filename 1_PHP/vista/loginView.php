<!-- Formulario login y sign in -->
<div class="form-container">
    <div class="form-background"></div>
    <div class="form-content">
        <a href="#" id="closeBtn"><i class="bi bi-x-lg"></i></a>
        <form action="./index.php" method="post">
            <div class="section">
                <div class="container-fluid">
                    <div class="row full-height justify-content-center">
                        <div class="col-12 text-center align-self-center py-5">
                            <div class="section pb-5 pt-5 pt-sm-2 text-center">
                                <h6 class="mb-0 pb-3"><span>Iniciar sesión </span><span>Registrarse</span></h6>
                                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                                <label for="reg-log"></label>
                                <div class="card-3d-wrap mx-auto">
                                    <div class="card-3d-wrapper">
                                        <div class="card-front">
                                            <div class="center-wrap">
                                                <div class="section text-center">
                                                    <h4 class="mb-4 pb-3">Iniciar sesión</h4>
                                                    <div class="form-group">
                                                        <i class="input-icon bi bi-at"></i>
                                                        <input type="email" class="form-style" placeholder="Email">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" class="form-style" placeholder="Contraseña">
                                                        <i class="input-icon bi bi-lock"></i>
                                                    </div>
                                                    <?
                                                    if (isset($_SESSION['error'])) {
                                                        echo $_SESSION['error'];
                                                        unset($_SESSION['error']);
                                                    }
                                                    ?>
                                                    <input type="submit" value="Acceder" name="enviar" class="btn mt-4">
                                                    <!-- <p class="mb-0 mt-4 text-center">
                                                        <a href="" class="link" id="pwd">¿Olvidaste tu
                                                            contraseña?</a>
                                                    </p> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-back">
                                            <div class="center-wrap">
                                                <div class="section text-center">
                                                    <h4 class="mb-3 pb-3">Registrarse</h4>
                                                    <div class="form-group">
                                                        <input type="text" class="form-style" placeholder="Nombre completo" name="nombre" id="nombre">
                                                        <i class="input-icon bi bi-person"></i>
                                                        <?
                                                        //Si el campo está vacio hay que introducir dato requerido
                                                        if (isset($_REQUEST['registrar'])) {
                                                            if (vacio("nombre")) {
                                                        ?>
                                                                <span style="color:brown"> Introduce nombre completo</span>
                                                        <?
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="tel" class="form-style" placeholder="Teléfono" name="telefono" id="telefono">
                                                        <i class="input-icon bi bi-telephone"></i>
                                                        <?
                                                        //Si el campo está vacio hay que introducir dato requerido y si no cumple los requisitos se pide repetir intento
                                                        if (isset($_REQUEST['registrar'])) {
                                                            if (vacio("telefono")) {
                                                        ?>
                                                                <span style="color:brown"> Introduce telefono</span>
                                                            <?
                                                            } elseif (!patronTelefono()) {
                                                            ?>
                                                                <span style="color:brown"> Teléfono no válida, revise</span>
                                                        <?
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="email" class="form-style" placeholder="Email" name="email" id="email">
                                                        <i class="input-icon bi bi-at"></i>
                                                        <?
                                                        //Si el campo está vacio hay que introducir dato requerido y si no cumple los requisitos se pide repetir intento
                                                        if (isset($_REQUEST['registrar'])) {
                                                            if (vacio("email")) {
                                                        ?>
                                                                <span style="color:brown"> Introduce email</span>
                                                            <?
                                                            } elseif (!patronEmail()) {
                                                            ?>
                                                                <span style="color:brown"> Email no válida, revise</span>
                                                        <?
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" class="form-style" placeholder="Contraseña" name="contraseña" id="contraseña">
                                                        <i class="input-icon bi bi-lock"></i>
                                                        <?
                                                        //Si el campo está vacio hay que introducir dato requerido y si no cumple los requisitos se pide repetir intento
                                                        if (isset($_REQUEST['registrar'])) {
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
                                                    </div>
                                                    <?
                                                    if (isset($_SESSION['error'])) {
                                                        echo $_SESSION['error'];
                                                        unset($_SESSION['error']);
                                                    }
                                                    ?>
                                                    <input type="submit" value="Registrarse" name="registrar" class="btn mt-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>