<div class="proyect">
    <section class="py-5 text-center container">
        <form>
            <!-- BOTÓN VOLVER -->
        </form>
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="pro text-light">Proyectos</h1>
                <a class="categorias" href="#" data-target="disenos">
                    <i class="bi bi-bounding-box-circles"></i>
                    <span>Diseño gráfico</span>
                </a>
                <a class="categorias" href="#" data-target="ilustraciones">
                    <i class="bi bi-brush"></i>
                    <span>Ilustraciones</span>
                </a>
                <a class="categorias" href="#" data-target="web">
                    <i class="bi bi-pc-display-horizontal"></i>
                    <span>Diseño web</span>
                </a>
            </div>
        </div>
        <p class="intro text-center justify-text">
            Bienvenido a este portafolio digital donde podrás encontrar mi pasión por el diseño y desarrollo web plasmada en cada uno de los proyectos que te presento.
            <br>Aquí encontrarás una selección de ilustraciones, diseños y sitios web que he creado con mucha dedicación.
            <br>¡Espero que te gusten!
        </p>
    </section>
</div>

<form action="./index.php" method="post">
    <?php foreach ($array_categorias as $key => $categoria) : ?>
        <?php if ($key === 0) : ?>
            <div id="<?php echo $categoria->nombre_categoria ?>" class="album">
            <?php else : ?>
                <div id="<?php echo $categoria->nombre_categoria ?>" class="album" style="display: none;">
                <?php endif; ?>
                <div class="container">
                    <div class="row row-cols-1">
                        <?php foreach ($array_productos as $producto) : ?>
                            <?php if ($producto->categoria_id === $categoria->id_categoria) : ?>
                                <div class="col my-3">
                                    <div class="card shadow-sm my-3">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="300px" role="img" name="productoSVG">
                                            <a href="./index.php?producto=1" target="_self">
                                                <title><?php echo $producto->nombre_producto ?></title>
                                                <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/recursos/proyecto/<?php echo $producto->imagen_producto ?>" preserveAspectRatio="xMidYMid slice" />
                                                <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/recursos/proyecto/rect1.png" preserveAspectRatio="xMidYMid slice" class="negro" />
                                                <text x="50%" y="50%" fill="white"><?php echo $producto->descripcion_producto ?></text>
                                            </a>
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
</form>