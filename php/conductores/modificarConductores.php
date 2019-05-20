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
                                            <li><a href="#">Altas</a></li>
                                            <li><a href="#">Bajas</a></li>
                                            <li><a href="#">Modificaciones</a></li>
                                            <li><a href="#">Ver</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Reportes</a></li>
                                    <li><a href="#">Vehículos<span class="icono derecha fontawesome-caret-down"></span></a>
                                        <ul>
                                            <li><a href="#">Altas</a></li>
                                            <li><a href="#">Bajas</a></li>
                                            <li><a href="#">Modificaciones</a></li>
                                            <li><a href="#">Ver</a></li>
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
                        <h3 class="mtop40">Introduzca los siguentes datos</h3>
                        <!-- FORMULARIO -->
                        <form method="get">
                        <input type="text" name="RFC" id="" required>
                        <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                            $conductor = $_GET['RFC'];
                            $qConductor = "SELECT * FROM conductores WHERE RFC = '".$conductor."';";
                            $rConductor = select($qConductor);
                            // die(var_dump($rConductor));
                            while($rC = mysqli_fetch_array($rConductor)){
                                
                        ?>
                        <form action="agregar.php" method="POST" class="mtop40"style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                    <input type="text" name="nrfc" id="" class="validate"  value="<?php echo  $rC['RFC']; ?>" required>
                            </div>
                            <div class="input-field">
                                <label>Nombre</label>
                                    <input type="text" name="nombre" id=""  class="validate" value="<?php echo utf8_encode($rC['Nombre']); ?>" required>
                            </div>
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" id="" class="validate" value="<?php echo $rC['FechaNacimiento']; ?>" required>
                            <!-- FIRMA -->
                                <div class="file-field input-field">
                                    <p for="">(Opcional)</p>
                                    <div class="btn light-blue darken-4">
                                        <span>Firma</span>
                                        <input type="file" multiple name="firma">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" name="firma" type="text" placeholder="Sube la firma.">
                                    </div>
                                </div>
                                <div class="input-field">
                                        <label>Domicilio</label>
                                    <input type="text" name="domicilio" id="" class="validate" value="<?php echo  utf8_encode($rC['Domicilio']); ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Antigüedad</label>
                                    <input type="text" name="antiguedad" id="" class="validate" value="<?php echo $rC['Antiguedad']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono de Emergencia</label>
                                    <input type="text" name="telEmergencia" id="" class="validate" value="<?php echo  $rC['TelEmergencia']; ?>" required>
                                </div>
                                <select name="sexo">
                                    <option value="" disabled selected>Sexo</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                                <div class="input-field">
                                        <label>Tipo de Sangre</label>
                                    <input type="text" name="sangre" id="" class="validate" value="<?php echo $rC['TipoSangre']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Restricciones</label>
                                    <input type="text" name="restriccion" id="" class="validate" value="<?php echo$rC['Restriccion']; ?>" required>
                                </div>
                                <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Actualizar</button>
                        </form>
                        <?php
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>