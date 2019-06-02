<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['NIV'])){
		header('location: verVehiculos.php');
	}
	$conductor = $_GET['NIV'];
	$qEliminar = 'DELETE FROM vehiculos WHERE NIV ="'.$conductor.'";';
	// die(var_dump($qEliminar));
	consulta($qEliminar); 
	odbcConsulta($qEliminar);
    header('location: verVehiculos.php');