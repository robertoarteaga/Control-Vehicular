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
                                            <li><a href="#">Altas</a></li>
                                            <li><a href="eliminarConductores.php">Bajas</a></li>
                                            <li><a href="modificarConductores.php">Modificaciones</a></li>
                                            <li><a href="verConductores.php">Ver</a></li>
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
                                    <li><a href="../reportes/reportes.php">Reportes</a></li>
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
                    <a href="php/logout.php">Cerrar Sesión</a> 
                </div>
            </div>
        </header>
        <!-- CARD -->
        <div class="container-right flex flex-column">
            <div class="container-header flex">
                <div class="container-nav container-info flex">
                    <!-- UBICACIÓN DEL USUARIO -->
                    <p>Vehículos</p>
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
                        <h3 class="mtop20">Introduzca los siguentes datos</h3>
                        <!-- FORMULARIO -->
                        
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <select name="Propietario">
                                    <option value="" disabled selected>Selecciona el RFC</option>
                                    <?php 
                                        $qPropietarios = "SELECT RFC FROM propietarios;";
                                        $rPropietarios = select($qPropietarios);
                                        // die(var_dump($rConductor));
                                        while($rP = mysqli_fetch_array($rPropietarios)){
                                    ?>
                                    <option value="<?php echo($rP['RFC'])?>"><?php echo($rP['RFC'])?></option>
                                    <?php } ?>
                                </select>
                            <label>Propietario</label>    
                            </div>
                            
                            <div class="input-field mtop40">
                                <label for="">NIV</label>
                                <input type="text" name="NIV" id="" class="validate" required>
                            </div>
                            
                            <div class="input-field mtop40">
                                <label for="">Placa</label>
                                <input type="text" name="Placa" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Tipo</label>
                                <input type="text" name="Tipo" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Color</label>
                                <input type="text" name="Color" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Uso</label>
                                <input type="text" name="Uso" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Puertas</label>
                                <input type="text" name="Puertas" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Marca</label>
                                <input type="text" name="Marca" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Motor</label>
                                <input type="text" name="Motor" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Serie</label>
                                <input type="text" name="Serie" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Modelo</label>
                                <input type="text" name="Modelo" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Combustible</label>
                                <input type="text" name="Combustible" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Año</label>
                                <input type="text" name="Year" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Cilindraje</label>
                                <input type="text" name="Cilindraje" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Transmisión</label>
                                <input type="text" name="Transmision" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Linea</label>
                                <input type="text" name="Linea" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Origen</label>
                                <input type="text" name="Origen" id="" class="validate" required>
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>