<?php 
	session_start();
	include('conexion.php');

	if(!isset($_POST['usuario']) && !isset($_POST['password'])){
		header('location: index.php');
	}

	if(is_null($_POST['usuario']) && is_null($_POST['password'])){
		header('location: index.php');
	}
	$usuario  = $_POST['usuario'];
	$password = $_POST['password'];
	$qUser = "SELECT * FROM alumno WHERE expediente = ".$usuario; 
	
	$rUser = select($qUser); 
	
	if(mysqli_num_rows($rUser) == 0){
		header('location: index.php');
	}

	while($rU = mysqli_fetch_array($rUser)){
		if($rU['estado'] != 1){
			header('location: index.php');
			echo("La cuenta está desactivada");
		}
		if($rU['password'] == MD5($password)){
			// CREAR LA SESIÓN 
			$_SESSION['usuario'] = $rU['usuario'];
			header('location: main.php');
		} else {
			header('location: index.php');
			echo("Error en los datos");
		}
    }
    ?>