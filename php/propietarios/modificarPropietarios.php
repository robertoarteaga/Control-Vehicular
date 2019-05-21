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
    <title>Conductores</title>
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
                <!-- MENU BAR -->
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
                                            <li><a href="propietarios.php">Altas</a></li>
                                            <li><a href="eliminarPropietarios.php">Bajas</a></li>
                                            <li><a href="modificarPropietarios.php">Modificaciones</a></li>
                                            <li><a href="verPropietarios.php">Ver</a></li>
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
                    <!-- LOGOUT -->
                    <a href="../logout.php">Cerrar Sesión</a> 
                </div>
            </div>
        </header>
        <!-- CARD -->
        <div class="container-right flex flex-column">
            <div class="container-header flex">
                <div class="container-nav container-info flex">
                    <!-- UBICACIÓN DEL USUARIO -->
                    <p>Conductores</p>
                </div>
                <div class="container-nav container-logo flex"></div>
                <div class="container-nav container-name flex">
                    <!-- NOMBRE DEL USUARIO -->
                    <p><?php
                    
                    while($rU = mysqli_fetch_array($rUser)){

                        echo($rU['username']);
                    }?></p>
                </div>
            </div>
            <div class="container-content flex">
                <!-- CONTAINER CARD -->
                <div class="container-card flex">
                    
                    <div class="container-all flex flex-column flex-center center-align">
                        <h3 class="mtop40">Introduzca el RFC a modificar</h3>
                        <!-- FORMULARIO -->
                        <form method="get" style="width:50%;">
                        <div class="input-field">
                            <label>RFC</label>
                                <input type="text" name="RFC" id="" required class="validate">
                        </div>
                        <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                            if(isset($_GET['RFC'])){
                                $conductor = $_GET['RFC'];
                                $qConductor = "SELECT * FROM propietarios WHERE RFC = '".$conductor."';";
                                $rConductor = select($qConductor);
                                // die(var_dump($rConductor));
                                while($rC = mysqli_fetch_array($rConductor)){
                                
                        ?>
                        <form action="actualizar.php" method="POST" class="mtop40" style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                    <input type="text" name="nrfc" id="" class="validate"  value="<?php echo  $rC['RFC']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Nombre</label>
                                    <input type="text" name="nombre" id=""  class="validate" value="<?php echo utf8_encode($rC['Nombre']); ?>" required>
                            </div>
                                <div class="input-field">
                                        <label>Domicilio</label>
                                    <input type="text" name="domicilio" id="" class="validate" value="<?php echo  utf8_encode($rC['Direccion']); ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono</label>
                                    <input type="text" name="telefono" id="" class="validate" value="<?php echo  $rC['Telefono']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Correo</label>
                                    <input type="email" name="correo" id="" class="validate" value="<?php echo$rC['Correo']; ?>" required>
                                </div>
                                <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Actualizar</button>
                        </form>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>