<?
require_once './webroot/TCPDF-main/examples/tcpdf_include.php';
if (isset($_REQUEST['volverFactura'])) {
    $_SESSION['controlador'] = $controladores['admin'];
    $_SESSION['pagina'] = 'Admin';
    $_SESSION['vista'] = $vistas['admin'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['descargarFactura'])) {
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Configurar el PDF aquí (por ejemplo, agregar la cabecera y el pie de página, establecer fuentes, etc.)
    $pdf->AddPage();

    // Crear el contenido HTML de la factura
    $html = '<html>
    <head>
    <title>Factura: {$factura->nombre_factura}</title>
    </head>
    <body>
    <h2>Detalles de la factura</h2>
    <p>Fecha de pago: {$factura->fecha_pago}</p>
    <p>Fecha de factura: {$factura->fecha_factura}</p>
    <p>Estado: {$factura->estado}</p>
    </body>
    </html>'; 

    $pdf->writeHTML($html, true, 0, true, 0);
    $pdf->lastPage();
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="factura.pdf"');
    $pdf->Output('factura.pdf', 'I');
} else {
    $factura = FacturaDAO::findById($_SESSION['id_factura']);
    $usuario = UsuarioDAO::findById($_SESSION['id_usuario']);
    $proyecto = ProyectoDAO::findById($_SESSION['id_proyecto']);
}
