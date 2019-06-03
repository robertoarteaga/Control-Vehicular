<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['NIV'])){
		header('location: verVehiculos.php');
	}
	
	$conductor = $_GET['NIV'];
	$qConductor = "SELECT * FROM vehiculos WHERE NIV = '".$conductor."';";
	$rConductor = select($qConductor);
	while($rC = mysqli_fetch_array($rConductor)) {
		$pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
		$dom = new SimpleXMLElement( '<?xml version = "1.0"
		encoding = "utf-8" ?> <Vehiculos></Vehiculos>' );
		$ing = $dom->addChild('vehiculos');
		$ing -> addChild('ID:',$rc[0]);
		$ing -> addChild('RFC:',$rC[1]);
		$ing -> addChild('NIV:',$rC[2]);
		$ing -> addChild('Placa:',$rC[3]);
		$ing -> addChild('Color:',$rC[4]);
		$ing -> addChild('Marca:',$rC['Marca']);
	}

    $xmlData = $dom->saveXML();
    $dom->formatOutput = true;
    $d=$NIV.'_'.date('is');
    $strings_xml = $dom->saveXML("$pathXML/vehiculos/bajas/$d.xml");
    $d=$conductor.'_'.date('is');





    $pathPDF = parse_ini_file('./../config/config.ini')['pathPDF'];
    require('../../PDF/Bajas.php');

	$qEliminar = 'DELETE FROM vehiculos WHERE NIV ="'.$conductor.'";';
	// die(var_dump($qEliminar));
	consulta($qEliminar); 
	odbcConsulta($qEliminar);
    header('location: verVehiculos.php');