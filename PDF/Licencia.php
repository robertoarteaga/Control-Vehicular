<?php
require ('fpdf/fpdf.php');

require "phpqrcode/qrlib.php";

$dir='../../PDF';

$N=1;
$date = date('m/d/Y h:i:s a', time());
$filename= $dir."QRLicencias.$N.png";
$tamano=6;
$level ='M';
$framSize= 3;
$contenido="Numero de Licencia:" .$N."\n
           Fecha de Expedición:" .$date."\n
				   Fecha de Vencimiento:" .'5 años xD'."\n
				   Tipo de Licencia:" .'1';

QRcode::png($contenido,$filename,$level,$tamano,$framSize);


$pdf = new FPDF();
	$pdf->AddPage('P', array(105,148));
	$pdf->SetFont('Arial','',9);
	$pdf->image('../../PDF/logo.png',5,5,15);;
	$pdf-> Cell(69.5,-5,'Estados Unidos Mexicanos',0,1,'C');
	$pdf->Ln();
	$pdf-> Cell(89,22,utf8_decode('Poder Ejecutivo del Estado de Queretaro'),0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf-> Cell(91,-15,'Secretaria de Seguridad Ciudadana',0,0,'C');
	$pdf->Ln();
	$pdf-> Cell(71,22,'Licencia para Conducir',0,1,'C');
	$pdf->image('../../PDF/usuario.png',70,20,30);




	include("Conexion.php");
	$Con = Conectar();
	$SQL = "SELECT * FROM licencias WHERE Folio=1";
	$Query = EjecutarConsulta($Con, $SQL);
	$Fila = mysqli_fetch_row($Query);

	$random= rand(10000,10000000);
	$random2=rand(0,100);
			$pdf->SetFont('Arial','',7);
			$pdf-> Cell(55,2,'No.de Licencia',0,1,'R');
			$pdf->SetTextColor(232,12,59);$pdf->SetFont('Arial','',12);
			$pdf-> Cell(55,5,'Q'.$random.'-'.$random2,0,1,'R');//Número de Licencia
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','b',7);
			$pdf-> Cell(55,2,'AUTOMIVILISTA',0,1,'R');
			$pdf-> ln();$pdf-> ln();$pdf-> ln();$pdf-> ln();$pdf-> ln();
			$pdf-> ln();$pdf-> ln();

	  $SQL2 = "SELECT * FROM conductores WHERE RFC='$RFC'";
	  $Query2= EjecutarConsulta($Con, $SQL2);

	for ($J = 0;$J<mysqli_num_rows($Query2);$J++)
	{
	  $Fila2= mysqli_fetch_row($Query2);
			  $pdf-> Cell(90,4,'Nombre',0,1,'R');//Nombre
			  $pdf->SetFont('Arial','',15);
			  $pdf-> Cell(90,6,$Fila2[1],0,1,'R');
			  $pdf->SetFont('Arial','b',7);
			  $pdf-> Cell(90,4,'Observaciones',0,1,'R');


				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont('Arial','',7);
				$pdf-> Cell(20,3,'Fecha de Nacimiento',0,1,'L');
				$pdf->SetFont('Arial','',9);
				 $pdf-> Cell(20,3,$Fila2[2],0,1,'L');//Fecha Nacimiento

	}

		for ($I = 0;$I<mysqli_num_rows($Query2);$I++)
		{

				$pdf->SetFont('Arial','',7);
				$pdf-> Cell(20,3,'Fecha de Expedicion',0,1,'L');
				$pdf->SetFont('Arial','',9);
				$pdf-> Cell(20,4,$date,0,1,'L');//Fecha expedición

				$pdf->SetFont('Arial','b',7);
				$pdf-> Cell(20,4,'Valida hasta',0,0,'L');	$pdf->SetFont('Arial','',6);
				$pdf->SetFont('Arial','b',7.5);
				$pdf-> Cell(53,4,$date2,0,1,'L');
		    $pdf->SetFont('Arial','',7);
			 	$pdf-> Cell(20,4,utf8_decode('Antigüedad'),0,1,'L');
				$pdf->SetFont('Arial','',9);
				$pdf-> Cell(20,4,'0',0,1,'L');

			$pdf->image('../../PDF/tipo.png',10,120,15);
			$pdf-> Cell(0,4,'Firma',0,1,'C');
			$pdf->image("../../img/users/photo/$newFileName",40,95,20);
			$pdf->SetFont('Arial','',6);
			$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();
			$pdf-> Cell(60,1.8,'AUTORIADO PARA QUE LA PRESENTE',0,1,'R');
			$pdf-> Cell(60,1.8,'SEA RECABADA COMO GARANTIA DE',0,1,'R');
			$pdf-> Cell(50,1.8,'INFRACCION',0,0,'R');
			$pdf->image('../../PDF/queretaro.png',80,120,15);
//####################### Page 2


			$pdf->AddPage('P', array(105,148));
			$pdf->image('../../PDF/911.png',5,5,13);
			$pdf->image('../../PDF/numero.png',30,5,40);
			$pdf->image('../../PDF/089.png',85,5,15);
			$pdf->SetFont('Arial','B',8);
			$pdf->ln();$pdf->ln();$pdf->ln();
			//Domicilio
			$pdf->SetFont('Arial','B',8);
			$pdf-> Cell(90,3,'DOMICILIO',0,1,'R');
			$pdf-> Cell(90,3,utf8_decode('Calle, Número, Colonia'),0,1,'R');
			$pdf-> Cell(90,3,utf8_decode($Fila2[4]),0,1,'R');
			$pdf->image('../../PDF/carros.png',5,35,95);
			$pdf->SetFont('Arial','B',7);
			$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();
			$pdf-> Cell(20,3,'Restriccion',0,2,'R');
			$pdf-> Cell(20,3,'9 '.utf8_decode($Fila2[8]),0,2,'R');
			$pdf-> Cell(90,3,'Grupo Sanguineo',0,2,'R');
			$pdf-> Cell(90,3,$Fila2[7],0,1,'R');
			$pdf-> Cell(90,3,'Donador de Organos',0,1,'R');
			$pdf-> Cell(90,3,'-',0,1,'R');
			$pdf-> Cell(90,3,utf8_decode('Número de Emergencia'),0,1,'R');
			$pdf-> Cell(90,3,'+52'.$Fila2[9],0,1,'R');

		}
			$pdf->image('../../PDF/firma.png',80,70,20);
			$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();$pdf->ln();
			$pdf-> Cell(90,3,'M. EN A.P JUAN MARCOS GRANADOS TORRES',0,1,'R');
			$pdf-> Cell(90,3,'SECRETARIO DE SEGURIDAD CIUDADANA',0,1,'R');
			$pdf->ln();
			$pdf-> Cell(20,3,'Fundamento Legal',0,1,'R');
			$pdf->SetFont('Arial','',7);
			$pdf-> Cell(85,3,utf8_decode("Artículo 19 fracción XIII y 33 fracción II de la Ley Orgánica del Poder Ejecutivo del"),0,1,'C');
			$pdf-> Cell(85,3,utf8_decode('Estado de Querétaro,artículo 9 tracción XII y 55 de la Ley de Tránsito del Estado'),0,1,'C');
			$pdf-> Cell(85,3,utf8_decode('de Querétaro, artículo  4  de la  Ley de  Procediminetos de Tránsito del Estado'),0,1,'C');
			$pdf-> Cell(85,3,utf8_decode('de Querétaro,artículo 28 del Reglamento de Tránsito del Estado de Querétaro y'),0,1,'C');
			$pdf-> Cell(85,3,utf8_decode('artículo 6,fracción IV,inciso b) y 20 fracción IV de la Ley de la Secretaría de'),0,1,'C');
			$pdf-> Cell(85,3,utf8_decode('Seguridad Ciudadana del Estado de Querétaro'),0,1,'C');
			$pdf->image('../../PDF/queretaro.png',10,130,10);
			$pdf->image('../../PDF/sc.png',70,130,20);

			$pdf->image("../../PDF/QRLicencias.$N.png",70,130,20);

	$pdf->Output("$pathPDF/licencias/$d.pdf", "F");

?>
