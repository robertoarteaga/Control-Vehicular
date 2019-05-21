<?php 
	include('../config/conexion.php'); 
	if(!isset($_GET['usuario'])){
		header('location: verPropietarios.php'); 
	}
	$conductor = $_GET['rfc'];
	$qEliminar = 'UPDATE propietarios SET Estatus = 0 WHERE RFC ="'.$conductor.'";';
    consulta($qEliminar); 
    header('location: verPropietarios.php');