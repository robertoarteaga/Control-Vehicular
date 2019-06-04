<?php


require ('fpdf/fpdf.php');




  $pdf = new FPDF();
	$pdf->AddPage('P', array(105,148));
	$pdf->SetFont('Arial','B',15);
	$pdf->image('./../../PDF/logo.png',5,5,15);
	$pdf-> Cell(80,1,'Control Vehicular 2019',0,1,'C');
	$pdf-> Cell(80,10,'',0,1,'C');


				$pdf->SetFont('Arial','B',12);
             $pdf-> Cell(20,4,utf8_decode('Datos del Vehículo'),0,1,'L');
             $pdf->ln();
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Propietario: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf->Cell(0,5,utf8_decode($Propietario),'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('NIV: '),0,0,'C'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($NIV),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Placa: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Placa),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Tipo: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Tipo),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Color: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Color),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Uso: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Uso),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Puertas: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Puerta),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Marca: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Marca),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Motor: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Motor),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Serie: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Serie),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Modelo: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Modelo),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Combustible: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Combustible),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Año: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Year),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Cilindraje: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Cilindraje),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Transmisión: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Transmision),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Línea: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Linea),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Origen: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Origen),0,1,'C');

             $pdf->image('./../../PDF/codigo.png',10,120,45,12);


	$pdf->Output("$pathPDF/vehiculos/$d.pdf", "F");

?>
