<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['usuario'])){
		header('location: verVehiculos.php'); 
	}
	$conductor = $_GET['NIV'];
	$qEliminar = 'UPDATE vehiculos SET Estatus = 0 WHERE RFC ="'.$conductor.'";';
    consulta($qEliminar); 
    header('location: verVehiculos.php');