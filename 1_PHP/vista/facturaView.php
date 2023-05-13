<div class="product">
    <section class="py-5 text-center container">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="d-flex justify-content-center">
                    <form action="./index.php" method="post">
                        <button type="submit" class="volver volverFactura btn-outline-primary d-flex align-items-center" name="volverFactura">
                            <i class="bi bi-arrow-left-circle text-white"></i>
                        </button>
                    </form>
                    <h1 class="text-light">Factura <?php echo $factura->id_factura ?></h1>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h1>Factura: <?php echo $factura->nombre_factura ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h2>Detalles de la factura</h2>
      <p>Fecha de pago: <?php echo $factura->fecha_pago ?></p>
      <p>Fecha de factura: <?php echo $factura->fecha_factura ?></p>
      <p>Estado: <?php echo $factura->estado ?></p>
    </div>
    <div class="col-6">
      <h2>Proyecto relacionado</h2>
      <p>Nombre del proyecto: <?php echo $proyecto->nombre_proyecto ?></p>
      <p>Fecha del proyecto: <?php echo $proyecto->fecha_proyecto ?></p>
      <p>Usuario asignado: <?php echo $usuario->nombre_usuario ?></p>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <h3>Descargar factura</h3>
      <form action="./index.php" method="post" target="_blank">
        <input type="hidden" name="id_factura" value="<?php echo $factura->id_factura ?>">
        <button type="submit" class="btn btn-primary" name="descargarFactura" id="descargarFactura">
          <i class="bi bi-file-earmark-arrow-down me-2"></i>Descargar
        </button>
      </form>
    </div>
  </div>
</div>
