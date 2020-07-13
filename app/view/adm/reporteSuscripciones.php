<?php
require_once('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de suscripciones'),0,0,'C');
    // Salto de línea
    $this->Ln(24);

    $this->Cell(70,10,'Titulo',1,0,'C',0);
    $this->Cell(50,10,'Detalle',1,0,'C',0);
    $this->Cell(30,10,'Precio',1,0,'C',0);
    $this->Cell(40,10,'Fecha',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require_once 'cn.php';
$consulta = "SELECT * FROM Suscripcion sus JOIN Diario_Revista dr ON sus.Cod_producto = dr.Id 
                              JOIN Plan pl ON  sus.Cod_plan = pl.Cod_plan";

$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(70,10,$row['Titulo'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Detalle'],1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode('$ ').$row['Precio'],1,0,'C',0);
    $pdf->Cell(40,10,$row['Fecha_suscripcion'],1,1,'C',0);
}
$pdf->Output();
?>