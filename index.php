<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		header('location: main.php');
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style-login.css">
    <title>login</title>
</head>
<body>

	<div class="container-absolute flex">
		<div class="container-left flex flex-column">
			<div class="container-login flex flex-column">
				<form action="php/login.php" method="post">
					<h1>Inicio de sesión</h1>
					<p><span class="fontawesome-user"></span><input type="text" id="logUser" name="usuario" placeholder="Usuario"></p>
                    <p><span class="fontawesome-lock"></span><input type="password" id="logPassword" name="password" placeholder="Password" ></p>
                    <p><button type="submit">Aceptar</button></p>
				</form>
			</div>
		</div>

		<div class="container-right flex flex-column flex-center">
			<div class="container-text flex flex-center">
				<div class="container-title flex flex-center">
					<h1>¡Disponible en dispositivos móviles!</h1>
				</div>
			</div>
			<div class="container-images flex">
				<div class="container-ipad flex">
					<!-- <img src="img/ipad.png" width="90%" height="90%"> -->
				</div>
				<div class="container-iphone flex">
				</div>
			</div>
		</div>
    </div>
    
</body>
</html>