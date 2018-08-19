<?php
require_once('../../app/helpers/validator.class.php');
require_once('../../app/models/database.class.php');
require_once('../../app/models/factura.class.php');
require('../../web/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página 
    function Header()
    {
        // Logo
        $this->Image('../../web/images/Bitz_logo.png',18,8,14);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Proveedores', 0, 0, 'C');
        
        $this->Ln(10);
        
        //Informacion de la empresa
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(30, 10, 'Bitz Lab', 0, 0, 'C');
        $this->SetX(146);
        $this->Cell(30, 10, 'Fecha:', 0, 0);
        $this->SetX(158);
        $this->Cell(30, 10, date('d/m/Y'), 0, 0);
        
        $factura = new Factura;
        
        $this->Ln(4);
        $this->SetX(17); //Movimiento de posición en X
        $this->Cell(30, 10, 'El Salvador, San Salvador', 0, 0);
        $this->SetX(146);
        $this->SetX(159);

    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15); 
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$factura = new Factura;
// Creación del objeto de la clase heredada
$pdf     = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Salto de línea
$pdf->Ln(4);
$pdf->SetX(17); //Movimiento de posición en X
$pdf->Cell(30, 10, 'bitzlab@gmail.com', 0, 0);
// Salto de línea
$pdf->Ln(7);
$pdf->SetX(17); //Movimiento de posición en X
$pdf->SetX(53);
$factura->readUsuario();
$pdf->Cell(30, 10, utf8_decode($factura->getUsuario()), 0, 0);
$pdf->Ln(10);

$pdf->SetX(15); //Movimiento de posición en X
$pdf->SetFillColor(73, 66, 255);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(30, 6, 'Proveedor', 1, 0, 'C', 1);
$pdf->Cell(80, 6, utf8_decode('Dirección'), 1, 0, 'C', 1);
$pdf->Cell(25, 6, utf8_decode('Teléfono'), 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Correo', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos = $factura->getProveedor();
foreach ($datos as $row) {
    
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(30, 6, utf8_decode($row['nombre_prov']), 1, 0, 'C');
    $pdf->Cell(80, 6, utf8_decode($row['direccion_prov']), 1, 0, 'C');
    $pdf->Cell(25, 6, utf8_decode($row['telefono_prov']), 1, 0, 'C');
    $pdf->Cell(50, 6, utf8_decode($row['correo_prov']), 1, 0, 'C');
    $pdf->Ln(6);
}

$pdf->Ln(6);

$pdf->SetFont('Arial', '', 10);
$pdf->Output();
?> 