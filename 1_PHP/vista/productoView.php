<div class="product">
    <section class="py-5 text-center container">
        <div class="row pt-5">
            <div class="d-flex justify-content-center">
                <form action="./index.php" method="post">
                    <button type="submit" class="volver volverProducto btn-outline-primary d-flex align-items-center" name="volverProducto">
                        <i class="bi bi-arrow-left-circle text-white"></i>
                    </button>
                </form>
                <h1 class="prod text-light"><?php echo $producto->nombre_producto ?></h1>
            </div>
        </div>
    </section>
</div>
<div class="productTitle p-2 p-md-4 mb-4">
    <div class="col-md-6">
        <h2 class="lead my-3"><?php echo $categoria->nombre_categoria ?></h2>
        <p class="lead my-3"><?php echo $producto->descripcion_producto ?></p>
    </div>
    <form class="row g-3" action="./index.php" method="post">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary btn-comprar" type="submit" name="elegirProducto"><i class="bi bi-plus-circle"></i> Lo quiero!</button>
        </div>
    </form>
</div>




<div class="productDesc container my-5">
    <section class="row row-cols-1 my-4">
        <div class="col">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
                <div class="col-auto">
                    <svg class="bd-placeholder-img" width="400" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/archivos/archivo1.jpg" preserveAspectRatio="xMidYMid slice" />
                    </svg>
                </div>
                <div class="textoProd col p-4 px-5 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
                        additional content.Multiple lines of text that form the lede, informing new readers quickly and efficiently
                        about what’s most interesting in this post’s contents.
                        This is a wider card with supporting text below as a natural lead-in to
                        additional content.Multiple lines of text that form the lede, informing new readers quickly and efficiently
                        about what’s most interesting in this post’s contents.</p>
                    <!-- Dos caras de la misma moneda -->
                </div>
            </div>
        </div>
    </section>


    <section class="row row-cols-1 py-4">
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="400px" role="img" name="productoSVG">
                    <title>titulo</title>
                    <image x="0" y="0" width="100%" height="100%" xlink:href="./webroot/archivos/archivo1.jpg"/>
                </svg>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right d-flex justify-content-end pb-3">
                    <a class="me-1" href="#imagenesProducto" role="button" data-bs-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#115053" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"></path>
                        </svg>
                    </a>
                    <a href="#imagenesProducto" role="button" data-bs-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#115053" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"></path>
                        </svg>
                    </a>
                </div>
                <div class="col-12">
                    <div id="imagenesProducto" class="carousel slide" data-ride="#115053">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">

                                        </div>
                                    </a>

                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">
                                        </div>
                                    </a>
                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3 ">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">

                                        </div>
                                    </a>
                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">
                                        </div>
                                    </a>
                                    <a href="#" class="col-12 col-md-4 col-sm-12 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="./webroot/archivos/archivo1.jpg">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>