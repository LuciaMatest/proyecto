<?
require_once './webroot/TCPDF-main/examples/tcpdf_include.php';

if (isset($_REQUEST['volverFactura'])) {
    if (esAdmin()) {
        $_SESSION['controlador'] = $controladores['admin'];
        $_SESSION['pagina'] = 'Perfil admin';
        $_SESSION['vista'] = $vistas['admin'];
        require_once $_SESSION['controlador'];
    } else {
        $_SESSION['controlador'] = $controladores['user'];
        $_SESSION['pagina'] = 'Perfil usuario';
        $_SESSION['vista'] = $vistas['user'];
        require_once $_SESSION['controlador'];
    }
} elseif (isset($_REQUEST['descargarFactura'])) {
    $factura = getIdFactura($_SESSION['id_factura']);
    $proyecto = getIdProyecto($_SESSION['id_proyecto']);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Configurar el PDF aquí (por ejemplo, agregar la cabecera y el pie de página, establecer fuentes, etc.)
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();

    // Crear el contenido HTML de la factura
    $html = '<html>
            <style>
                .invoice-details {
                    background-color: #fff;
                    padding: 20px;
                    margin-bottom: 20px;
                    border-radius: 4px;
                    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);
                }
                
                .project-details {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 4px;
                    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);
                }
                
                table {
                    width: 100%;
                    border-collapse: separate;
                    border-spacing: 0 10px;
                }
                
                tr{
                    margin-bottom: 10px;
                }
                
                th {
                    text-align: left;
                    padding: 5px 10px;
                    border-bottom: 1px solid #eee;
                }
                
                td {
                    font-weight: bold;
                    padding: 5px 10px;
                    border-bottom: 1px solid #eee;
                }
                
                h2 {
                    margin-top: 0;
                    font-size: 24px;
                    font-weight: bold;
                    color: #115053;
                }
                
                .header h1 {
                    font-family: "Barlow Semi Condensed", sans-serif;
                    font-weight: bold;
                    font-size: 36px;
                    color: white;
                    margin: 0;
                }
                
                .header {
                    background-color:#115053;
                    text-align: center;
                    padding: 10px;
                }
            </style>
            <body>
                <div class="header">
                    <h1>Factura: ' . $factura['nombre_factura'] . '</h1>
                </div>
                <div class="invoice-details">
                    <h2>Detalles de la factura</h2>
                    <table>
                    <tr>
                        <th>Fecha de pago:</th>
                        <td> ' . $factura['fecha_pago'] . '</td>
                    </tr>
                    <tr>
                        <th>Fecha de factura:</th>
                        <td> ' . $factura['fecha_factura'] . '</td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td> ' . $factura['estado'] . '</td>
                    </tr>
                    </table>
                </div>
                <div class="project-details">
                    <h2>Detalles del proyecto</h2>
                    <table>
                    <tr>
                        <th>Nombre del proyecto:</th>
                        <td> ' . $proyecto['nombre_proyecto'] . '</td>
                    </tr>
                    <tr>
                        <th>Fecha del proyecto:</th>
                        <td> ' . $proyecto['fecha_proyecto'] . '</td>
                    </tr>
                    </table>
                </div>
            </body>
    </html>';

    $img_file = './webroot/recursos/logo_blanco.jpg'; // Reemplaza con la ruta de tu imagen
    $pdf->setAlpha(0.1); // Set the opacity (0.5 means 50% opacity)
    $pdf->Image($img_file, 13, 20, 40, 35, 'JPG', 'http://18.100.5.60/');
    $pdf->setAlpha(1); // Reset the opacity back to 100% for subsequent elements

    $pdf->writeHTML($html, true, 0, true, 0);
    $pdf->lastPage();
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="factura.pdf"');
    $pdf->Output('factura.pdf', 'I');
} else {
    // $factura = FacturaDAO::findById($_SESSION['id_factura']);
    // $proyecto = ProyectoDAO::findById($_SESSION['id_proyecto']);
    $factura = getIdFactura($_SESSION['id_factura']);
    $proyecto = getIdProyecto($_SESSION['id_proyecto']);
}
