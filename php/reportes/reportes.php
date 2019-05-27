<?php
    session_start();
    include('../config/conexion.php');
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
    <link rel="stylesheet" href="../../css/materialize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/functions.js"></script>
    <script src="../../js/materialize.min.js"></script>
    
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
                                    <li><a href="../../main.php">Inicio</a></li>
                                    <li><a href="#">Conductores<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="../conductores/conductores.php">Altas</a></li>
                                            <li><a href="../conductores/eliminarConductores.php">Bajas</a></li>
                                            <li><a href="../conductores/modificarConductores.php">Modificaciones</a></li>
                                            <li><a href="../conductores/verConductores.php">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Licencias</a></li>
                                    <li><a href="#">Multas</a></li>
                                    <li><a href="#">Propietarios<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="../propietarios/propietarios.php">Altas</a></li>
                                            <li><a href="../propietarios/eliminarPropietarios.php">Bajas</a></li>
                                            <li><a href="../propietarios/modificarPropietarios.php">Modificaciones</a></li>
                                            <li><a href="../propietarios/verPropietarios.php">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Reportes</a></li>
                                    <li><a href="#">Vehículos<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="../vehiculos/vehiculos.php">Altas</a></li>
                                            <li><a href="../vehiculos/eliminarVehiculos.php">Bajas</a></li>
                                            <li><a href="../vehiculos/modificarVehiculos.php">Modificaciones</a></li>
                                            <li><a href="../vehiculos/verVehiculos.php">Ver</a></li>
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
                <div class="container-card flex">
                    <h4 class="center bold">Reportes</h4>
                    <div class="container-all flex space-ar" style="height: 100%; width:100%;">
                        <a href="reporteConductores.php" class="card-reporte card-conductores yellow"><p id="tlink">Conductores</p></a>
                        <a href="reporteLicencias.php" class="card-reporte card-licencias orange"><p id="tlink">Licencias</p></a>
                        <a href="reporteMultas.php" class="card-reporte card-multas blue"><p id="tlink">Multas</p></a>
                        <a href="reportePropietarios.php" class="card-reporte card-propietarios pink"><p id="tlink">Propietarios</p></a>
                        <a href="reporteRobos.php" class="card-reporte card-robos"><p id="tlink">Robos</p></a>
                        <a href="reporteTenencias.php" class="card-reporte card-tenencias light-green darken-4"><p id="tlink">Tenencias</p></a>
                        <a href="reporteVehiculos.php" class="card-reporte card-vehiculos light-blue darken-4"><p id="tlink">Vehículos</p></a>
                        <a href="reporteVerificaciones.php" class="card-reporte card-verificaciones lime"><p id="tlink">Verificaciones</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>