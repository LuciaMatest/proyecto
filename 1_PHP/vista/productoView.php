<div class="proyect">
    <section class="py-5 text-center container">
        <form action="./index.php" method="post">
            <span class="btn-back pt-sm-5 pt-lg-0" name="volver" onclick="goBack()" style="cursor:pointer;">
                <i class="bi bi-chevron-left"></i>
            </span>
        </form>
        <div class="row pt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="pro text-light"><?php echo $producto->nombre_producto ?></h1>
            </div>
        </div>
    </section>
</div>