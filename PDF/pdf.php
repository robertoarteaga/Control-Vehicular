<?php
require 'fpdf/fpdf.php';

$pdf=new FPDF();
//Añadir hoja
$pdf->AddPage();
//Fuente de la letra
$pdf->SetFont('Arial','B',15);
//Posición de eje X
$pdf->SetX(20);
//Posición en eje Y
$pdf->SetY(10);
//Llamado de celda
$pdf->Cell(100,20,'Hola Mundo del PDF',1,1,'C');
//Extracción de Valores inicial de X,Y
$y=$pdf->GetY();
$pdf->SetY($y+60);

//$pdf->SetX(50);
//$pdf->SetY(50);
//Color letras
$pdf->SetTextColor(255,87,51);
//Llamado Multicelda
$pdf->MultiCell(80,15,'Hola Mundo del PDF 2',1,1,'C',true);

//SalidaMuestra de pdf 
$pdf->Image('logo.png',15,10,10);
$pdf->Cell(80,15,'___________________________',0,1,'C');

$pdf->Output();

?>