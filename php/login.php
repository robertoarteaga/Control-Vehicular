<?php 
	session_start();
	include('config/conexion.php');

	if(!isset($_POST['usuario']) && !isset($_POST['password'])){
		header('location: ../index.php');
	}

	if(is_null($_POST['usuario']) && is_null($_POST['password'])){
		header('location: ../index.php');
	}
	$usuario  = $_POST['usuario'];
	$password = $_POST['password'];
	$qUser = "SELECT * FROM usuarios WHERE username = '".$usuario."';"; 
	
	$rUser = select($qUser); 
	// die(var_dump($qUser));
	if(mysqli_num_rows($rUser) == 0){
		header('location: ../index.php');
	}

	while($rU = mysqli_fetch_array($rUser)){
		if($rU['estado'] != 1){
			header('location: ../index.php');
			echo("La cuenta está desactivada");
		}
		if($rU['password'] == $password){
			// CREAR LA SESIÓN
			$_SESSION['usuario'] = $rU['username'];
			header('location: ../main.php');
		} else {
			header('location: ../index.php');
			echo("Error en los datos");
		}
    }
    ?>