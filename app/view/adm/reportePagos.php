<?php
require_once('pdf/fpdf.php');
//require_once('interno.php');

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
    $this->Cell(100);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Cobros'),0,0,'C');
    // Salto de línea
    $this->Ln(24);

    $this->Cell(60,10,'Titulo',1,0,'C',0);
    $this->Cell(60,10,'Fecha Pago',1,0,'C',0);
    $this->Cell(40,10,'Precio',1,0,'C',0);
    $this->Cell(80,10,'Tarjeta Nro',1,0,'C',0);
    $this->Cell(40,10,'Usuario',1,1,'C',0);
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
$consulta = "SELECT * FROM Pago pg JOIN Plan pl ON  pg.Cod_plan = pl.Cod_plan
                      JOIN Diario_Revista dr ON pg.Cod_producto = dr.Id
                      JOIN Usuario usu ON pg.Id_usuario = usu.Id_usuario";

$resultado = $mysqli->query($consulta);

$pdf = new PDF('P','mm','A3');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


while($row = $resultado->fetch_assoc()){
    $pdf->Cell(60,10,$row['Titulo'],1,0,'C',0);
    $pdf->Cell(60,10,$row['Fecha_pago'],1,0,'C',0);
    $pdf->Cell(40,10,utf8_decode('$ ').$row['Precio'],1,0,'C',0);
    $pdf->Cell(80,10,$row['Nro_tarjeta'],1,0,'C',0);
    $pdf->Cell(40,10,$row['Nombre'],1,1,'C',0);
}
$pdf->Output();
?>