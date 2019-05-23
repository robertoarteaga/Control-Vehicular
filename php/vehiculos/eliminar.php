<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['NIV'])){
		header('location: verVehiculos.php');
	}
	$conductor = $_GET['NIV'];
	$qEliminar = 'UPDATE vehiculos SET Estatus = 0 WHERE NIV ="'.$conductor.'";';
	// die(var_dump($qEliminar));
    consulta($qEliminar); 
    header('location: verVehiculos.php');