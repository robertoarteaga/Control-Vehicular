<?php
require ('fpdf/fpdf.php');
$pdf = new FPDF();
	$pdf->AddPage('P', array(105,148));
	$pdf->SetFont('Arial','B',15);
	$pdf->image('../../PDF/logo.png',5,9,15);
    $pdf-> Cell(80,4,'Control Vehicular 2019',0,1,'C');
    $pdf-> ln();
    $pdf->SetFont('Arial','B',14);
    $pdf-> Cell(0,4,utf8_decode('Acta Tipo: '),0,1,'C');
    $pdf->SetTextColor(232,12,59);  
    $pdf->SetFont('Arial','B',15);
    $pdf-> Cell(0,5,utf8_decode('BAJA de Vehículo'),0,1,'C');
    $pdf->ln();
		include("Conexion.php");
		$Con = Conectar();
		$SQL = "SELECT * FROM vehiculos WHERE NIV='$conductor' ";
		$Query = EjecutarConsulta($Con, $SQL);
	  for ($F = 0;$F<mysqli_num_rows($Query);$F++)
	  {
		$Fila = mysqli_fetch_row($Query); 
             
             $pdf->SetTextColor(0,0,0);
			 $pdf->SetFont('Arial','B',12);
             $pdf-> Cell(20,4,utf8_decode('Datos del Vehículo'),0,1,'L');
             $pdf->ln();
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Propietario: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[0]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('NIV: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[1]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Placa: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[2]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Tipo: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[3]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Color: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[4]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Uso: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[5]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Puertas: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[6]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Marca: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[7]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Motor: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[8]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Número de Serie: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[9]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Modelo: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[10]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Combustible: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[11]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Año: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[12]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Cilindraje: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[13]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Transmisión: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[14]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Línea: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[15]),0,1,'C');
             $pdf->SetFont('Arial','B',10);
             $pdf-> Cell(20,4,utf8_decode('Origen: '),0,0,'L'); $pdf->SetFont('Arial','',10);$pdf-> Cell(0,5,utf8_decode($Fila[16]),0,1,'C');
             
             $pdf->image('../../PDF/codigo.png',10,130,45,12);
    
	  }	 
	  

	$pdf->Output("$pathPDF/vehiculos/bajas/$d.pdf", "F");

?>
