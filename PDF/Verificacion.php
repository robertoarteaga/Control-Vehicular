<?php

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L', array(105,200));


$pdf->image('../../PDF/SDS.png',5,5,40);
$pdf->image('../../PDF/CVV.png',50,7,18);
$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();
include("Conexion.php");
$Con = Conectar();
$SQL ="SELECT * FROM vehiculos WHERE idVehiculo=$vehiculo";
$Query = EjecutarConsulta($Con, $SQL);

   for ($I = 0;$I<mysqli_num_rows($Query);$I++)
{
    $Fila = mysqli_fetch_row($Query); 
   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(0,4,utf8_decode('PROGRAMA ESTATAL DE VERIFICACIÓN VEHICULAR'),0,1,'R') ;
   $pdf->Cell(0,4,utf8_decode('GOBIERNO DEL ESTADO DE QUERÉTARO'),0,1,'R') ;
   $pdf->image('../../PDF/codigo.png',145,18,45,12);
   $pdf->ln();
   $pdf->Cell(40,3.5,utf8_decode('DATOS DEL VEHÍCULO'),0,1,'L');
   $pdf->ln(); $pdf->ln(); 
   //Datos del Vehículo
   $pdf->SetFont('Arial','',8);
   $pdf->Cell(40,3.5,utf8_decode($Fila[6]),0,0,'L') ; $pdf->Cell(40,3.5,utf8_decode($Fila[8].'/'.$Fila[16]),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode($Fila[13].'/'.$Fila[11]),0,0,'R');$pdf->Cell(40,3.5,utf8_decode($Fila[3]),0,1,'R');
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,'TIPO DE SERVICIO',0,0,'L') ; $pdf->Cell(40,3.5,utf8_decode('MARCA/SUBMARCA'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode('AÑO/MODELO'),0,0,'R');$pdf->Cell(40,3.5,utf8_decode('PLACA'),0,1,'R');
   
   $pdf->Cell(40,1,'',0,1,'L') ;

   $pdf->SetFont('Arial','',8);
   $pdf->Cell(40,3.5,utf8_decode($Fila[10]),0,0,'L') ; $pdf->Cell(40,3.5,utf8_decode('-'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode($Fila[12]),0,0,'R');$pdf->Cell(40,3.5,utf8_decode($Fila[2]),0,1,'R');
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,utf8_decode('NÚMERO DE SERIE'),0,0,'L' ); $pdf->Cell(40,3.5,utf8_decode('CLASE'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode('TIPO DE COMBUSTIBLE'),0,0,'R');$pdf->Cell(40,3.5,utf8_decode('NIV'),0,1,'R');

   $pdf->SetFont('Arial','',8);
   $pdf->Cell(40,3.5,utf8_decode($Fila[14]),0,0,'L') ; $pdf->Cell(40,3.5,utf8_decode('-'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode('QUERÉTARO'),0,0,'R');$pdf->Cell(40,3.5,utf8_decode('QUERÉTARO'),0,1,'R');
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,utf8_decode('NÚMERO DE CILINDROS'),0,0,'L' ); $pdf->Cell(40,3.5,utf8_decode('TIPO DE CARROCERÍA'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode('ENTIDAD FEDERATIVA'),0,0,'R');$pdf->Cell(40,3.5,utf8_decode('MUNICIPIO'),0,1,'R');
   $pdf->ln();
}
   $SQL2 ="SELECT * FROM verificaciones WHERE Vehiculo=$vehiculo";
   $Query2 = EjecutarConsulta($Con, $SQL2);
   
      for ($f = 0;$f<mysqli_num_rows($Query);$f++)
   {
       $Fila2 = mysqli_fetch_row($Query2); 
   $pdf->Cell(40,3.5,utf8_decode('No. DE CENTRO'),0,0,'L' );$pdf->Cell(40,3.5,utf8_decode($Fila2[3]),0,1,'L' );
   $pdf->Cell(40,3.5,utf8_decode('FECHA DE EXPEDICIÓN'),0,0,'L' );$pdf->Cell(40,3.5,utf8_decode($Fila2[2]),0,1,'L' );
   $pdf->Cell(40,3.5,utf8_decode('HORA DE SAIDA'),0,0,'L' );$pdf->Cell(40,3.5,date('HH,MM'),0,1,'L' );
   $pdf->Cell(40,3.5,utf8_decode('MOTIVO DE VERIFICACIÓN'),0,0,'L' );$pdf->Cell(40,3.5,utf8_decode('REVISIÓN OBLIGATORIA'),0,1,'L' );
   $pdf->Cell(40,3.5,utf8_decode('FOLIO DE CERTIFICADO'),0,0,'L' );$pdf->Cell(40,3.5,utf8_decode($Fila2[0]),0,1,'L' );
   $pdf->SetFont('Arial','',11);
   $pdf->Cell(40,4,utf8_decode('DICTAMEN'),0,0,'L' );
   $pdf->SetFont('Arial','',12);$pdf->SetTextColor(232,12,59);$pdf->Cell(40,4,utf8_decode($Fila2[5]),0,1,'L' );


}

$pdf->Output("$pathPDF/verificaciones/$d.pdf", "F");
 ?>

