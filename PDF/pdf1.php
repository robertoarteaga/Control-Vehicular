<?php
require ('fpdf/fpdf.php');
$pdf = new FPDF();
	$pdf->AddPage('P', array(105,148));
	$pdf->SetFont('Arial','',9);
//$pdf->image('bold.png',85,4,10);
//	$pdf->image('logo.png',5,5,15);;
	$pdf-> Cell(69.5,-5,'Estados Unidos Mexicanos',0,1,'C');
	$pdf->Ln();
	$pdf-> Cell(89,22,'Poder Ejecutivo del Estado de Queretaro',0,1,'C');
	//$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf-> Cell(91,-15,'Secretaria de Seguridad Ciudadana',0,0,'C');
	$pdf->Ln();
	$pdf-> Cell(71,22,'Licencia para Conducir',0,1,'C');
	//$pdf->image('employee.png',-1,27,-300);




		include("Conexion.php");
		$Con = Conectar();
		$SQL = "SELECT * FROM licencias";
		$Query = EjecutarConsulta($Con, $SQL);//
	  for ($F = 0;$F<mysqli_num_rows($Query);$F++)
	  {
	    $Fila = mysqli_fetch_row($Query); //devulve una fila de la tabla de datos de la entidad

				 $pdf->SetTextColor(232,12,59);
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,1,$Fila[0],0,1,'R');//IDLicencia
				 $pdf-> ln();

				 $pdf->SetTextColor(0,0,0);
				 $pdf->SetFont('Arial','',9);

				 //$pdf-> Cell(80,4,'Conductor',0,1,'R');
				 //$pdf-> Cell(80,4,$Fila[1],0,1,'R');//Conductor
				 $pdf->SetFont('Arial','',7);//cambio de fuente
         $pdf-> Cell(80,3,$Fila[3],0,1,'R');//Tipo
				 $pdf->SetFont('Arial','',9);//fuente normal

         $pdf->SetFont('Arial','',7);
				 $pdf-> Cell(80,3,'Fecha de Nacimiento',0,1,'R');
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,4,$Fila[4],0,1,'R');

         $pdf->SetFont('Arial','',7);
				 $pdf-> Cell(80,3,'Fecha de Expedicion',0,1,'R');
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,4,$Fila[2],0,1,'R');

         $pdf->SetFont('Arial','',7);
				 $pdf-> Cell(80,4,'Valida hasta',0,1,'R');
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,4,'2021-01-21',0,1,'R');

         $pdf->SetFont('Arial','',7);
				 $pdf-> Cell(80,4,'Antiguedad',0,1,'R');
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,4,'2021-01-21',0,1,'R');

				 $pdf->SetFont('Arial','',7);
				 $pdf-> Cell(80,4,'Antiguedad',0,1,'R');
				 $pdf->SetFont('Arial','',9);
				 $pdf-> Cell(80,4,'14',0,1,'R');

				// $pdf-> Cell(40,10,$Fila[5],0,1,'L');
				// $pdf-> Cell(40,10,$Fila[6],0,1,'L');
	  }
      $pdf->SetFont('Arial','',15);
		  $pdf-> Cell(17,6,'Baltazar',0,1,'R');
			$pdf-> Cell(13,6,'Torres',0,1,'R');
			$pdf->SetFont('Arial','B',15);
			$pdf-> Cell(23,6,'Alejandro',0,1,'R');

			$pdf->SetFont('Arial','',7);
			$pdf-> Cell(15,4,'Observaciones',0,1,'R');

			//$pdf->image('firma.png',50,100,27);
			//$pdf->

	$pdf->Output();

?>