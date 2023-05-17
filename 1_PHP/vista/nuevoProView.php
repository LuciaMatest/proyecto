<div class="product">
    <section class="py-5 text-center container">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="d-flex justify-content-center">
                    <form action="./index.php" method="post">
                        <button type="submit" class="volver volverNuevo btn-outline-primary d-flex align-items-center" name="volverNuevo">
                            <i class="bi bi-arrow-left-circle text-white"></i>
                        </button>
                    </form>
                    <h1 class="text-light">Nuevo</h1>
                </div>
                <div class="my-3">
                    <select id="tipo" class="form-select">
                        <option value="producto">Nuevo producto</option>
                        <option value="proyecto">Nuevo proyecto</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container my-4">
    <form action="./index.php" method="post" enctype="multipart/form-data">
        <!-- Campos para productos -->
        <div class="producto">
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre_producto">
            </div>

            <div class="mb-3">
                <label for="descripcion_producto" class="form-label">Descripción del producto</label>
                <input type="text" class="form-control" id="descripcion_producto">
            </div>

            <div class="mb-3">
                <label for="imagen_producto" class="form-label">Imagen del producto</label>
                <input type="file" class="form-control" name="imagen_producto" id="imagen_producto" value="">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio">
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad">
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría ID</label>
                <select class="form-select" id="categoria_id">
                    <option value="dise">1 - Diseño gráfico</option>
                    <option value="ilus">2 - Ilustración</option>
                    <option value="des">3 - Desarrollo web</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="proyecto_id" class="form-label">Proyecto ID</label>
                <select class="form-select" id="proyecto_id">
                    <option value="pro1">Proyecto 1</option>
                    <option value="pro2">Proyecto 2</option>
                    <option value="pro3">Proyecto 3</option>
                </select>
            </div>

            <div class="d-flex justify-content-end my-3">
                <input type="submit" class="new btn btn-primary my-3 ml-3" name="nuevoProducto" id="nuevoProducto" value="Crear producto">
            </div>
        </div>

        <!-- Campos para proyectos -->
        <div class="proyecto" style="display: none;">
            <div class="mb-3">
                <label for="nombre_proyecto" class="form-label">Nombre del proyecto</label>
                <input type="text" class="form-control" id="nombre_proyecto">
            </div>

            <div class="mb-3">
                <label for="fecha_proyecto" class="form-label">Fecha del proyecto</label>
                <input type="datetime-local" class="form-control" id="fecha_proyecto">
            </div>

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario ID</label>
                <select class="form-select" id="usuario_id">
                    <option value="u1">Usuario 1</option>
                    <option value="u2">Usuario 2</option>
                    <option value="u3">Usuario 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="factura_id" class="form-label">Factura ID</label>
                <select class="form-select" id="factura_id">
                    <option value="fac1">Factura 1</option>
                    <option value="fac2">Factura 2</option>
                    <option value="fac3">Factura 3</option>
                </select>
            </div>
            <div class="d-flex justify-content-end my-3">
                <input type="submit" class="new btn btn-primary my-3 ml-3" name="nuevoProyecto" id="nuevoProyecto" value="Crear proyecto">
            </div>
        </div>
    </form>
</div>