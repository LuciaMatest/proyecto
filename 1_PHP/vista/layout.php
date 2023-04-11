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
    <title><? echo $_SESSION['pagina']; ?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navigation-->
    <form action="./index.php" method="post">
        <header class="cabecera navbar navbar-expand-lg fixed-top" id="headerNav">
            <div class="container-fluid px-4 px-lg-5">
                <h2 class="titulo text-light mx-3">Lulú</h2>
                <button class="menuBtn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="btn-group navbar-nav ms-auto my-2 my-lg-0">
                        <?php
                        if (estaValidado()) {
                            echo '<li class="nav-item"><button type="submit" class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Área privada" name="privada">
                        <i class="bi bi-person-circle"></i></button></li>';
                            echo '<li class="nav-item"><button type="submit" class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Logout" name="logout">
                        <i class="bi bi-x-circle"></i></button></li>';
                        } else {
                        ?>
                            <li class="nav-item">
                                <button type="submit" class="popover btn-outline-primary mx-2" data-toggle="popover" data-content="Iniciar sesión/Registro" name="login" id="login">
                                    <i class="bi bi-arrow-right-circle"></i>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="submit" class="popover btn-outline-primary  mx-2" data-toggle="popover" data-content="Contacto" name="contacto">
                                    <i class="bi bi-question-circle"></i>
                                </button>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </header>
    </form>

    <main class="flex-grow-1">
        <?php
        require_once $_SESSION['vista'];
        ?>
    </main>

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