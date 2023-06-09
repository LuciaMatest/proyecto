<div class="proyect">
    <section class="py-5 text-center container">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="d-flex justify-content-center">
                    <form action="./index.php" method="post">
                        <button type="submit" class="volver volverProyecto btn-outline-primary d-flex align-items-center" name="volverProyecto" title="Volver al proyecto">
                            <i class="bi bi-arrow-left-circle text-white"></i>
                        </button>
                    </form>
                    <h1 class="pro text-light">Categorías</h1>
                </div>
                <a class="categorias" href="#" data-target="Diseño">
                    <i class="bi bi-bounding-box-circles"></i>
                    <span>Diseño gráfico</span>
                </a>
                <a class="categorias" href="#" data-target="Ilustraciones">
                    <i class="bi bi-brush"></i>
                    <span>Ilustraciones</span>
                </a>
                <a class="categorias" href="#" data-target="Web">
                    <i class="bi bi-pc-display-horizontal"></i>
                    <span>Desarrollo web</span>
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


<?php foreach ($array_categorias as $key => $categoria) : ?>
    <?php if ($key === 0) : ?>
        <div id="<?php echo $categoria['nombre_categoria'] ?>" class="album">
        <?php else : ?>
            <div id="<?php echo $categoria['nombre_categoria'] ?>" class="album" style="display: none;">
            <?php endif; ?>
            <div class="container">
                <div class="row row-cols-1 text-center">
                    <h1><?php echo $categoria['nombre_categoria'] ?></h1>
                    <?php foreach ($array_productos as $producto) : ?>
                        <?php if ($producto['categoria_id'] === $categoria['id_categoria']) : ?>
                            <div class="col my-3">
                                <div class="card shadow-sm my-3">
                                    <form action="./index.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'] ?>">
                                        <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria'] ?>">
                                        <button type="submit" class="botonProductos btn btn-outline-none text-white" name="mostrarProducto" style="width: 100%; height: auto;">
                                            <svg class="bd-placeholder-img card-img-top" width="100%" height="300px" role="img" name="productoSVG" preserveAspectRatio="xMidYMid meet">
                                                <title><?php echo $producto['nombre_producto'] ?></title>
                                                <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/recursos/proyecto/<?php echo $producto['url_imagen'] ?>" preserveAspectRatio="xMidYMid slice" />
                                                <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/recursos/proyecto/rect1.png" preserveAspectRatio="xMidYMid slice" class="negro" />
                                                <text x="50%" y="50%" fill="white" class="textoProducto"><?php echo $producto['descripcion_producto'] ?></text>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        <?php endforeach; ?>