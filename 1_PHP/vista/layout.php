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
    <!-- CSS -->
    <link rel="stylesheet" href="./webroot/css/header.css">
    <link rel="stylesheet" href="./webroot/css/main.css">
    <link rel="stylesheet" href="./webroot/css/loader.css">
    <link rel="stylesheet" href="./webroot/css/login.css">
    <link rel="stylesheet" href="./webroot/css/proyectos.css">
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
                    <ul class="btn-group navbar-nav ms-auto my-2 my-lg-0 d-flex flex-row flex-wrap">
                        <?php
                        if (estaValidado()) {
                            echo '<li class="nav-item"><button class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Área privada" name="privada" id="privada">
                    <i class="bi bi-person-circle"></i></button></li>';
                            echo '<li class="nav-item"><button class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Logout" name="logout" id="logout">
                    <i class="bi bi-x-circle"></i></button></li>';
                        } else {
                        ?>
                            <li class="nav-item">
                                <span class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Iniciar sesión/Registro" name="login" id="login">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                            </li>
                            <li class="nav-item">
                                <button class="popover btn-outline-primary" data-toggle="popover" data-content="Contacto" name="contacto" id="contacto">
                                    <i class="bi bi-question-circle"></i>
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
    <div class="form-container">
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
                                                            <input type="email" class="form-style" id="email" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <input type="password" class="form-style" id="password" name="password" placeholder="Contraseña">
                                                            <i class="input-icon bi bi-lock"></i>
                                                        </div>
                                                        <?
                                                        if (isset($_SESSION['error'])) {
                                                            echo $_SESSION['error'];
                                                            unset($_SESSION['error']);
                                                        }
                                                        ?>
                                                        <input type="submit" value="Acceder" name="enviar" class="btn mt-4">
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
                                                        <div class="form-group mt-2">
                                                            <input type="password" class="form-style" placeholder="Repetir contraseña" name="contraseña2" id="contraseña2">
                                                            <i class="input-icon bi bi-lock"></i>
                                                            <?
                                                            //Si el campo está vacio hay que introducir dato requerido y si no cumple los requisitos se pide repetir intento
                                                            if (isset($_REQUEST['registrar'])) {
                                                                if (vacio("contraseña2")) {
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

    <!-- Footer -->
    <div class="pie container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-2">
            <p class="col-md-4 mb-0">&copy; 2023 Código artístico</p>

            <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="./webroot/recursos/logo_blanco.png" alt="logo">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2">Aviso legal</a></li>
            </ul>
        </footer>
    </div>
    <script src="./webroot/js/funciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>