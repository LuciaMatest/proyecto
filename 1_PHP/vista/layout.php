<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portafolio de diseño y desarrollo web" />
    <meta name="author" content="Lucía Mateos Esteban" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./webroot/recursos/icono_logo.ico" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./webroot/css/header.css">
    <link rel="stylesheet" href="./webroot/css/main.css">
    <link rel="stylesheet" href="./webroot/css/loader.css">
    <link rel="stylesheet" href="./webroot/css/login.css">
    <link rel="stylesheet" href="./webroot/css/proyecto.css">
    <link rel="stylesheet" href="./webroot/css/contacto.css">
    <link rel="stylesheet" href="./webroot/css/producto.css">
    <link rel="stylesheet" href="./webroot/css/privada.css">
    <title><? echo $_SESSION['pagina']; ?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="cabecera navbar navbar-expand-lg fixed-top" id="headerNav">
        <div class="container-fluid px-4 px-lg-5">
            <h2 class="titulo text-light mx-3">Lulú</h2>
            <form action="./index.php" method="post">
                <!-- Navigation-->
                <nav class="navbar-collapse">
                    <ul class="btn-group navbar-nav ms-auto my-2 my-lg-0 d-flex flex-row flex-wrap align-items-center">
                        <?php
                        if (estaValidado()) { ?>
                            <li class="nav-item">
                                <button class="btn-outline-primary" name="privada" id="privada">
                                    <i class="bi bi-person-fill-lock me-2"></i>
                                    <span>Mi perfil</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="btn-outline-primary" name="logout" id="logout">
                                    <i class="bi bi-x-circle me-2"></i>
                                    <span>Cerrar sesión</span>
                                </button>
                            </li>
                        <? } else {
                        ?>
                            <li class="nav-item">
                                <span class="btn-outline-primary d-flex align-items-center" name="login" id="login">
                                    <i class="bi bi-person-circle me-2"></i>
                                    <span>Iniciar Sesión / Registro</span>
                                </span>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-outline-primary d-flex align-items-center" name="contacto" id="contacto">
                                    <i class="bi bi-question-circle me-2"></i>
                                    <span>Contacto</span>
                                </button>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </form>
        </div>
    </header>


    <main class="flex-grow-1">
        <?php
        require_once $_SESSION['vista'];
        ?>
    </main>

    <!-- Formulario login y sign in -->
    <div id="login" class="form-container">
        <div class="form-background"></div>
        <div class="form-content">
            <form action="./index.php" method="post">
                <a href="#" id="closeBtn"><i class="bi bi-x-lg"></i></a>
                <div class="section">
                    <div class="container-fluid">
                        <div class="row full-height justify-content-center">
                            <div class="col-12 text-center align-self-center py-5">
                                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                                    <h6 class="mb-0 pb-3"><span>Iniciar sesión </span><span>Registrarse</span></h6>
                                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" value="1" />
                                    <label for="reg-log"></label>
                                    <div class="card-3d-wrap mx-auto">
                                        <div class="card-3d-wrapper">
                                            <div class="card-front">
                                                <div class="center-wrap">
                                                    <div class="section text-center">
                                                        <h4 class="mb-4 pb-3">Iniciar sesión</h4>
                                                        <?
                                                        if (isset($_SESSION['error'])) {
                                                            echo $_SESSION['error'];
                                                            unset($_SESSION['error']);
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <i class="input-icon bi bi-at"></i>
                                                            <input type="email" class="form-style" id="email_usuario" name="email_usuario" placeholder="Email" value="<?php if (isset($_COOKIE['email_usuario'])) {
                                                                                                                                                                            echo $_COOKIE['email_usuario'];
                                                                                                                                                                        } ?>">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <i class="input-icon bi bi-lock"></i>
                                                            <input type="password" class="form-style" id="contrasena_usuario" name="contrasena_usuario" placeholder="Contraseña">
                                                        </div>
                                                        <div class="mt-2">
                                                            <!-- Al loguearse el usuario puede seleccionar recuerdame para que cuando cierre sesion se mantenga su nombre de usuario y solo tenga que escribir de nuevo la contraseña -->
                                                            <input type="radio" id="recuerdame" name="recuerdame" <?php if (isset($_COOKIE['recuerdame'])) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> />
                                                            <label for="recuerdame" class="text-light ms-2">Recuerdame</label>
                                                        </div>
                                                        <input type="submit" value="Acceder" name="enviar" class="btn mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-back">
                                                <div class="center-wrap">
                                                    <div class="section text-center">
                                                        <h4 class="mb-3 pb-3">Registrarse</h4>
                                                        <div class="form-group">
                                                            <?php
                                                            $placeholder = "Nombre completo";
                                                            $style = "";
                                                            $iconStyle = "";

                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("nombre")) {
                                                                    $placeholder = "Introduce nombre completo";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                }
                                                            }
                                                            ?>
                                                            <input type="text" class="form-style" placeholder="<?php echo $placeholder; ?>" name="nombre" id="nombre" style="<?php echo $style; ?>">
                                                            <i class="input-icon bi bi-person" style="<?php echo $iconStyle; ?>"></i>
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <?php
                                                            $placeholder = "Teléfono";
                                                            $style = "";
                                                            $iconStyle = "";

                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("telefono")) {
                                                                    $placeholder = "Introduce teléfono";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                } elseif (!patronTelefono()) {
                                                                    $placeholder = "Teléfono no válido, revise";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                }
                                                            }
                                                            ?>
                                                            <input type="tel" class="form-style" placeholder="<?php echo $placeholder; ?>" name="telefono" id="telefono" style="<?php echo $style; ?>">
                                                            <i class="input-icon bi bi-telephone" style="<?php echo $iconStyle; ?>"></i>
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <?php
                                                            $placeholder = "Email";
                                                            $style = "";
                                                            $iconStyle = "";

                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("email")) {
                                                                    $placeholder = "Introduce email";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                } elseif (!patronEmail()) {
                                                                    $placeholder = "Email no válida, revise";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                }
                                                            }
                                                            ?>
                                                            <input type="email" class="form-style" placeholder="<?php echo $placeholder; ?>" style="<?php echo $style; ?>" name="email" id="email">
                                                            <i class="input-icon bi bi-at" style="<?php echo $iconStyle; ?>"></i>
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <?php
                                                            $placeholder = "Contraseña";
                                                            $style = "";
                                                            $iconStyle = "";

                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("contraseña")) {
                                                                    $placeholder = "Introduce contraseña";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                } elseif (!patronEmail()) {
                                                                    $placeholder = "Contraseña no válida, revise";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                }
                                                            }
                                                            ?>
                                                            <input type="password" class="form-style" placeholder="<?php echo $placeholder; ?>" style="<?php echo $style; ?>" name="contraseña" id="contraseña">
                                                            <i class="input-icon bi bi-lock" style="<?php echo $iconStyle; ?>"></i>
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <?php
                                                            $placeholder = "Repetir contraseña";
                                                            $style = "";
                                                            $iconStyle = "";

                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("contraseña2")) {
                                                                    $placeholder = "Introduce contraseña";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                } elseif (!patronContraseña()) {
                                                                    $placeholder = "Contraseña no válida, revise";
                                                                    $style = "font-weight: bold; color: brown; background-color: white;";
                                                                    $iconStyle = "color: brown;";
                                                                }
                                                            }
                                                            ?>
                                                            <input type="password" class="form-style" placeholder="<?php echo $placeholder; ?>" style="<?php echo $style; ?>" name="contraseña2" id="contraseña2">
                                                            <i class="input-icon bi bi-lock" style="<?php echo $iconStyle; ?>"></i>
                                                        </div>
                                                        <?php
                                                        if (isset($_SESSION['success'])) {
                                                            echo '<p style="color:green">' . $_SESSION['success'] . "</p>";
                                                            unset($_SESSION['success']);
                                                        }

                                                        if (isset($_SESSION['error'])) {
                                                            echo '<p style="color:red">' . $_SESSION['error'] . "</p>";
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

    <!-- Footer -->
    <div class="pie container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-2">
            <p class="col-md-4 mb-0">&copy; 2023 Código artístico</p>

            <a href="./index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="./webroot/recursos/logo_blanco.png" alt="logo">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2">Aviso legal</a></li>
            </ul>
        </footer>
    </div>
    <script src="./webroot/js/funciones.js"></script>
    <script src="./webroot/js/contacto.js"></script>
    <script src="./webroot/js/chat.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>