<?php

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L', array(105,148));
//$pdf->image('marca.png',0,0,200);


include("Conexion.php");
$Con = Conectar();
$SQL ="SELECT * FROM vehiculos WHERE idVehiculo=4";
$Query = EjecutarConsulta($Con, $SQL);


for ($F = 0;$F<mysqli_num_rows($Query);$F++)
{ 
   $random= rand(10000,1000000);
   $Fila = mysqli_fetch_row($Query);
   
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(10,3.5,'Tipo de Servicio Holograma',0,0,'L');$pdf->Cell(0,3.5,'Folio
   Vigencia',0,0,'C');$pdf->Cell(-10,3.5,'Placa ',0,1,'R');

   $pdf->SetFont('Arial','',8);
   $pdf-> Cell(10,3.5,$Fila[6],0,0,'L'); $pdf->Cell(100,3.5,$random,0,0,'C'); $pdf->Cell(10,3.5,$Fila[3],0,1,'R');

}

//Selección de Nombre de Propietario
   $SQL2="SELECT * FROM propietarios WHERE Nombre='Roberto'";
   $Query2= EjecutarConsulta($Con, $SQL2);

for ($J = 0;$J<mysqli_num_rows($Query2);$J++)
{
   $Fila2 = mysqli_fetch_row($Query2);

   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(20,3.5,'Propietario',0,0,'L');
   
   $pdf->SetFont('Arial','',9);
   $pdf->Cell(64,5,utf8_decode($Fila2[1]),0,1,'C');
}


   for ($I = 0;$I<mysqli_num_rows($Query);$I++)
{
      
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,'RFC',0,0,'L') ;$pdf->Cell(40,3.5,utf8_decode('Número de Serie'),0,0,'C');$pdf->Cell(40,3.5,'Modelo',0,1,'R');

   $pdf->SetFont('Arial','',8);
   $pdf->Cell(40,3.5,utf8_decode($Fila[1]),0,0,'L') ;$pdf->Cell(40,3.5,$Fila[10],0,0,'C') ;$pdf->Cell(40,3.5,$Fila[11],0,1,'R');

   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,'LOCALIDAD',0,0,'L') ; $pdf->Cell(40,3.5,utf8_decode('Marca/Línea/Sublinea'),0,0,'C'); $pdf->Cell(40,3.5,utf8_decode('Operación'),0,1,'R');

   $pdf->SetFont('Arial','',8);
   $pdf->Cell(40,3.5,'Santiago de ',0,0,'L'); $pdf->Cell(40,3.5,$Fila[8],0,0,'C'); $pdf->Cell(40,3.5,'2017/2104540*',0,1,'R');
   $pdf->Cell(40,3.5,utf8_decode('Querétaro'),0,0,'L');
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(80,3.5,'Folio',0,1,'R');

   $pdf->Cell(40,3.5,'MUNICIPIO',0,0,'L');$pdf->SetFont('Arial','',8) ; $pdf->Cell(80,3.5,$random,0,1,'R');

   $pdf->Cell(40,3.5,utf8_decode('Querétaro'),0,0,'L'); $pdf->SetFont('Arial','B',8); $pdf->Cell(80,3.5,'Placa Ant',0,1,'R');
   $pdf->Cell(40,1,'',0,1,'L');

   $pdf->Cell(40,3.5,utf8_decode('Número de Constancia'),0,0,'L'); $pdf->SetFont('Arial','',8) ;$pdf->Cell(0,3.5,'Cilindraje '.$Fila[14],0,0,'L') ; $pdf->Cell(-45,3.5,'CVE vehicular ',0,0,'R');$pdf->Cell(37,3.5,utf8_decode('Fecha de Expedición'),0,1,'R');
   $pdf->SetFont('Arial','B',8) ;
   $pdf->Cell(40,3.5,utf8_decode('de Inscripción (NCI)'),0,0,'L'); $pdf->SetFont('Arial','',8) ;$pdf->Cell(0,3.5,'Capacidad 0',0,0,'L'); $pdf->Cell(-60,3.5,$Fila[0],0,0,'R');$pdf->Cell(52,3.5, date('Y-M-D'),0,1,'R');

   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,'Origen',0,0,'L');  $pdf->SetFont('Arial','',8);$pdf->Cell(0,3.5,'Puertas '.$Fila[7],0,0,'L'); $pdf->Cell(-55,3.5,'Clase '.$Fila[4],0,0,'R');$pdf->Cell(47,3.5,'Oficina Expendidora',0,1,'R');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(40,3.5,$Fila[17],0,0,'L');
   $pdf->SetFont('Arial','',8);$pdf->Cell(15,3.5,'Asiestos '.$Fila[7],0,0,'C'); $pdf->Cell(16,3.5,'Tipo '.$Fila[4],0,0,'R');$pdf->Cell(50,3.5,'Movimiento',0,1,'R');

   $pdf->SetFont('Arial','',8);$pdf->Cell(110,3.5,'Combustible '.$Fila[12],0,0,'C'); $pdf->Cell(10,3.5,'Uso   '.$Fila[6],0,1,'R');

   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,3.5,'Color',0,0,'L');$pdf->Cell(30,3.5,utf8_decode('Tansmisión'),0,0,'L');$pdf->Cell(50,3.5,utf8_decode('Número de Motor'),0,1,'R');

   $pdf->SetFont('Arial','',10);
   $pdf->Cell(40,3.5,$Fila[5],0,0,'L'); $pdf->SetFont('Arial','',8);$pdf->Cell(30,3.5,utf8_decode($Fila[15]),0,0,'L');$pdf->Cell(50,3.5,$Fila[9],0,1,'R');
   

                                                   


   $pdf->image('logo2.png',5,80,40);
   $pdf->SetFont('Arial','B',10);
   $pdf->ln();
   $pdf->Cell(0,4,'PODER EJECUTIVO DEL',0,1,'C');
   $pdf->Cell(0,4,'ESTADO DE QUERETARO',0,1,'C');
   $pdf->image('qr.png',120,80,20);
   $pdf->image('TC.png',50,90,65);



}

$pdf->Output();
 ?>

