<?php 
	// session_start();
	// $_SESSION['usuario'] = 'root';
	// header('location: ../main.php');

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
	$archive = $_FILES['key'];
	
	$directorio = $archive['tmp_name'];

	if($directorio){
		$key = "";
		$manejador = fopen($directorio, "r");
		$string = fgets($manejador);
		
	} else {
		$string = "";
	}
	
	$qUser = "SELECT * FROM usuarios WHERE username = '".$usuario."';"; 
	// die(var_dump($qUser));
	$rUser = select($qUser); 
	// die(var_dump($qUser));
	if(mysqli_num_rows($rUser) == 0){
		echo'<script type="text/javascript">
                alert("El usuario no existe");
                window.location.href="../index.php";
                </script>';
	}

	while($rU = mysqli_fetch_array($rUser)){
		// die(var_dump($rU));
		if($rU['estado'] == 0){
			echo'<script type="text/javascript">
                alert("Cuenta Desactivada");
                window.location.href="../index.php";
                </script>';
		}
		if($rU['password'] == $password && $string == $password){
			// CREAR LA SESIÓN
			$_SESSION['usuario'] = $rU['username'];
			header('location: ../main.php');
		} else {
			echo'<script type="text/javascript">
                alert("Revisa tus datos");
                window.location.href="../index.php";
                </script>';
		}
    }
    ?>