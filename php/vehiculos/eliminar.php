<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['usuario'])){
		header('location: verConductores.php'); 
	}
	$conductor = $_GET['rfc'];
	$qEliminar = 'UPDATE conductores SET Estatus = 0 WHERE RFC ="'.$conductor.'";';
    consulta($qEliminar); 
    header('location: verConductores.php');