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
    $factura = FacturaDAO::findById($_SESSION['id_factura']);
    $proyecto = ProyectoDAO::findById($_SESSION['id_proyecto']);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Configurar el PDF aquí (por ejemplo, agregar la cabecera y el pie de página, establecer fuentes, etc.)
    $pdf->AddPage();

    // Crear el contenido HTML de la factura
    $html = '<html>
    <head>
        <title>Factura: ' . $factura->nombre_factura . '</title>
        <style>
            body {
                background-color: #f8f8f8;
                color: #333;
            }
            
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
                border-collapse: collapse;
            }
            
            th {
                text-align: left;
                padding: 5px 10px;
                border-bottom: 1px solid #ccc;
            }
            
            td {
                padding: 5px 10px;
                border-bottom: 1px solid #eee;
            }
            
            h2 {
                margin-top: 0;
                font-size: 24px;
                font-weight: bold;
                color: #333;
            }
            
            h1 {
                font-size: 36px;
                font-weight: bold;
                color: #333;
            }
            
            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            
            .header img {
                max-height: 80px;
            }
        </style>
    </head>
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
