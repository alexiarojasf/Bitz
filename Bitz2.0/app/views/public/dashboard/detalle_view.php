<?php
require_once('../app/helpers/validator.class.php');
require_once('../app/models/database.class.php');
require_once('../app/models/factura.class.php');
require('../web/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página 
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'FACTURA', 0, 0, 'C');
        
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
        $this->Cell(30, 10, 'Ticket:', 0, 0);
        $this->SetX(159);
        $factura->setId($_GET['id']);
        $factura->readUsuario();
        $this->Cell(30, 10, $factura->getId(), 0, 0);
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
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
$pdf->Cell(30, 10, 'Consumidor/Cliente:', 0, 0);
$pdf->SetX(53);
$factura->setId($_GET['id']);
$factura->readUsuario();
$pdf->Cell(30, 10, $factura->getUsuario(), 0, 0);
$pdf->Ln(10);

$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(73, 66, 255);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(70, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Precio', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Subtotal', 1, 0, 'C', 1);
$pdf->Ln(6);

$factura->setId($_GET['id']);
$datos = $factura->getDetalleFactura();
foreach ($datos as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(18);
    $pdf->Cell(70, 6, utf8_decode($row['nombre_prod']), 1, 0, 'C');
    $pdf->Cell(35, 6, $row['precio_prod'], 1, 0, 'C');
    $pdf->Cell(35, 6, $row['cantidad_producto'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['subtotal'], 1, 1, 'C');
}

$pdf->SetFont('Arial', '', 10);
$pdf->Output();
?> 