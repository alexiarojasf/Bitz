<?php
require_once('../../app/helpers/validator.class.php');
require_once('../../app/models/database.class.php');
require_once('../../app/models/producto.class.php');
require('../../web/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../web/images/Bitz_logo.png',18,8,14);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 13);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Existencias de productos', 0, 0, 'C');
        
        $this->Ln(12);
        
        //Informacion de la empresa
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(30, 10, 'Bitz Lab', 0, 0, 'C');
        $this->SetX(146);
        $this->Cell(30, 10, 'Fecha:', 0, 0);
        $this->SetX(158);
        $this->Cell(30, 10, date('d/m/Y'), 0, 0);
        $this->Ln(4);
        $this->SetX(146);
        $this->Cell(30, 10, 'Hora:', 0, 0);
        $this->SetX(158);
        $this->Cell(30, 10, date('H:i'), 0, 0);
        
        $this->Ln(4);
        $this->SetX(17); //Movimiento de posición en X
        $this->Cell(30, 10, 'El Salvador, San Salvador', 0, 0);     
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(274);
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$producto = new Producto;
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(10,10,10);

date_default_timezone_get("America/El_Salvador");
// Salto de línea
$pdf->Ln(4);
$pdf->SetX(17); //Movimiento de posición en X
$pdf->Cell(30, 10, 'bitzlab@gmail.com', 0, 0);
// Salto de línea
$pdf->Ln(10);

$pdf->SetX(18);
$pdf->Cell(30, 10, 'Productos disponibles', 0, 0);
$pdf->Ln(10);
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(73, 66, 255);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(30, 6, 'Codigo', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Precio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Modelo', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos = $producto->GetProdDisponibles();
foreach ($datos as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(18);
    $pdf->Cell(30, 6, $row['id_producto'], 1, 0, 'C');
    $pdf->Cell(35, 6, $row['nombre_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['cantidad_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['precio_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['modelo_prod'], 1, 0, 'C');

    $pdf->Ln();
}

$pdf->Ln(10);

$pdf->SetX(18);
$pdf->Cell(30, 10, 'Productos no disponibles', 0, 0);
$pdf->Ln(10);
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(73, 66, 255);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(30, 6, 'Codigo', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Precio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Modelo', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos2 = $producto->GetProdNoDisponibles();
foreach ($datos2 as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(18);
    $pdf->Cell(30, 6, $row['id_producto'], 1, 0, 'C');
    $pdf->Cell(35, 6, $row['nombre_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['cantidad_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['precio_prod'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['modelo_prod'], 1, 0, 'C');

    $pdf->Ln();
}

$pdf->SetFont('Arial', '', 10);
$pdf->Output();
?> 