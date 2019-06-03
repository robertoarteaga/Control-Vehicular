<?php

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L', array(105,130));


$pdf->image('logo2.png',5,5,20);
$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();
include("Conexion.php");
$Con = Conectar();
$SQL ="SELECT * FROM multas WHERE idVerificacion=10";
$Query = EjecutarConsulta($Con, $SQL);

   for ($I = 0;$I<mysqli_num_rows($Query);$I++)
{
    $Fila = mysqli_fetch_row($Query); 
   $pdf->SetFont('Arial','B',12);   
   $pdf->Cell(0,4,utf8_decode('Secretaría de Seguridad Pública'),0,1,'R') ;
   $pdf->Cell(0,6,utf8_decode('y Tránsito Municipal'),0,1,'R') ;
   $pdf->SetFont('Arial','B',13);
   $pdf->Cell(0,2,utf8_decode(' '),0,1,'L');
   $pdf->Cell(0,6,utf8_decode('ACTA DE MULTA'),0,1,'L') ;$pdf->image('codigo.png',75,23,45,9);
   $pdf->SetFont('Arial','B',9);$pdf->SetTextColor(232,12,59);

   $pdf->Cell(0,5,utf8_decode('Folio'),0,0,'L');$pdf->SetTextColor(0, 0,0);
   $pdf->SetFont('Arial','',9); $pdf->Cell(-90,5,utf8_decode($Fila[0]),0,1,'R') ;

   $pdf->SetFont('Arial','B',9);
   $pdf->Cell(0,2,utf8_decode(' '),0,1,'L');
   $pdf->Cell(92,4,utf8_decode('Fecha de expedición '),0,0,'R') ; $pdf->SetFont('Arial','',9);$pdf-> Cell(0,4,$Fila[6],0,1,'R');
}
   
$SQL2="SELECT * FROM vehiculos WHERE idVehiculo=4";
$Query2= EjecutarConsulta($Con, $SQL2);

   for ($J = 0;$J<mysqli_num_rows($Query2);$J++)
{
   $pdf->ln(); 
   $Fila2= mysqli_fetch_row($Query2); 
   $pdf->SetFont('Arial','B',9);$pdf->Cell(40,4,utf8_decode('Nombre  de Conductor:'),0,0,'L' );
   $pdf->SetFont('Arial','',9);
   $pdf->Cell(40,4,utf8_decode($Fila2[1]),0,1,'L' );

   $pdf->SetFont('Arial','B',9);$pdf->Cell(40,4,utf8_decode('No. de Licencia:'),0,0,'L' );
   $pdf->SetFont('Arial','',9);
   $pdf->Cell(40,4,utf8_decode($Fila2[3]),0,1,'L' );

}

for ($F = 0;$F<mysqli_num_rows($Query);$F++)
{

   $pdf->SetFont('Arial','B',10);$pdf->Cell(40,4,utf8_decode('Motivo'),0,1,'L' );
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(40,4,utf8_decode($Fila[4]),0,1,'L' );

   $pdf->SetFont('Arial','B',10);$pdf->Cell(0,4,utf8_decode('Emisor de Multa'),0,1,'R' );
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(0,4,utf8_decode($Fila[5]),0,1,'R' );

   $pdf->SetFont('Arial','B',10);$pdf->Cell(0,4,utf8_decode('Monto de la Multa'),0,1,'L' );
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(0,4,utf8_decode('$'.$Fila[7].'.00 MXN'),0,1,'L' );

   $pdf->SetFont('Arial','B',10);$pdf->Cell(40,4,utf8_decode('Garantía'),0,0,'L' );
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(20,4,utf8_decode($Fila[9]),0,1,'L' );

   $pdf->SetFont('Arial','B',10);$pdf->Cell(40,4,utf8_decode('Descripción'),0,0,'L' );
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(40,4,utf8_decode($Fila[8]),0,1,'L' );
}

$pdf->Output();
 ?>

