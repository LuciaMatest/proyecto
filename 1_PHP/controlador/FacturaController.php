<?
if (isset($_REQUEST['volverFactura'])) {
    $_SESSION['controlador'] = $controladores['admin'];
    $_SESSION['pagina'] = 'Admin';
    $_SESSION['vista'] = $vistas['admin'];
    require_once $_SESSION['controlador'];
} else {
    $factura = FacturaDAO::findById($_SESSION['id_factura']);
}
