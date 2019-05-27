<?php
    session_start();
    include('php/config/conexion.php');
    $session=($_SESSION['usuario']);
    
    if(!isset($_SESSION['usuario'])){
		header('location: index.php');
    }
	if(is_null($_SESSION['usuario']) && $_SESSION['usuario'] == 0){
		header('location: index.php');
	}
	$qUser = "SELECT * FROM usuarios WHERE username = '".$_SESSION['usuario']."';";
    $rUser = select($qUser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/functions.js"></script>
</head>
<body>
    <div class="container-absolute flex">
        <!-- HEADER -->
        <header>
            <div class="container-menu flex flex-column">
                <div class="container-menu-title flex">
                    <h1>Menu</h1>
                </div>
                <div class="container-menu-links flex flex-column">
                        <div class="contenedor-menu">
                                <a href="#" class="btn-menu">Menu<i class="icono fa fa-bars"></i></a>
                        
                                <ul class="menu">
                                    <li><a href="main.php">Inicio</a></li>
                                    <li><a href="#">Conductores<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="php/conductores/conductores.php">Altas</a></li>
                                            <li><a href="php/conductores/eliminarConductores.php">Bajas</a></li>
                                            <li><a href="php/conductores/modificarConductores.php">Modificaciones</a></li>
                                            <li><a href="php/conductores/verConductores.php">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Licencias</a></li>
                                    <li><a href="#">Multas</a></li>
                                    <li><a href="#">Propietarios<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="php/propietarios/propietarios.php">Altas</a></li>
                                            <li><a href="php/propietarios/eliminarPropietarios.php">Bajas</a></li>
                                            <li><a href="php/propietarios/modificarPropietarios.php">Modificaciones</a></li>
                                            <li><a href="php/propietarios/verPropietarios.php">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="php/reportes/reportes.php">Reportes</a></li>
                                    <li><a href="#">Vehículos<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="php/vehiculos/vehiculos.php">Altas</a></li>
                                            <li><a href="php/vehiculos/eliminarVehiculos.php">Bajas</a></li>
                                            <li><a href="php/vehiculos/modificarVehiculos.php">Modificaciones</a></li>
                                            <li><a href="php/vehiculos/verVehiculos.php">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Verificaciones</a></li>
                                </ul>
                            </div>
                </div>
                <div class="container-menu-logout flex">
                    <a href="php/logout.php">Cerrar Sesión</a> 
                </div>
            </div>
        </header>
        <!-- CARD -->
        <div class="container-right flex flex-column">
            <div class="container-header flex">
                <div class="container-nav container-info flex">
                    <p>Inicio</p>
                </div>
                <div class="container-nav container-logo flex"></div>
                <div class="container-nav container-name flex">
                    <p><?php
                    
                    while($rU = mysqli_fetch_array($rUser)){

                        echo($rU['username']);
                    }?></p>
                </div>
            </div>
            <div class="container-content flex">
                <div class="container-card flex ">
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
</body>
</html>