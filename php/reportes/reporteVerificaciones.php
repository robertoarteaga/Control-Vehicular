<?php
    session_start();
    $session=($_SESSION['usuario']);
    
    if(!isset($_SESSION['usuario'])){
		header('location: ../index.php');
    }
	if(is_null($_SESSION['usuario']) && $_SESSION['usuario'] == 0){
		header('location: ../index.php');
	}
    
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
                                    <li><a href="reportes.php">Reportes</a></li>
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
                </div>
                <div class="container-nav container-logo flex"></div>
                <div class="container-nav container-name flex">
                </div>
            </div>
            <div class="container-content flex">
                <div class="container-card flex">
                    <div class="container-all flex flex-column flex-center center-align">
                        <h4>Reporte de Verificaciones</h4>
                        <form method="POST" style="width:60%;">
                            <div class="input-field">
                                <label>Criterio</label>
                                <input type="text" name="criterio" id="" class="validate" required>
                            </div>
                            <select name="columna">
                                <option value="" disabled selected>Columna</option>
                                <option value="idVerificacion">ID</option>  
                                <option value="Vehiculo">Vehículo</option>
                                <option value="Periodo">Periodo</option>
                                <option value="CentroVerificacion">Centro de Verificación</option>
                                <option value="Tipo">Tipo</option>
                                <option value="Dictamen">Dictamen</option>
                            </select>
                            <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                        include('../config/conexion.php');
                            if(isset($_POST['criterio'])){
                                
                            $criterio = $_POST['criterio'];
                            $columna = $_POST['columna'];

                            $sql = 'SELECT * FROM verificaciones WHERE '.$columna.' LIKE BINARY "%'.$criterio.'%";';
                            // die(var_dump($sql));
                            $res = select($sql);
                            $rows = mysqli_num_rows($res);
                                    if($rows == 0){
                                        print("No se encontraron resultados.");
                                    }else{
                            ?>
                            <table class="striped centered center-align responsive-table mtop40">
                                <thead>
                                    <tr>
                                        <th>ID Verificacion</th>
                                        <th>Vehiculo</th> 
                                        <th>Periodo</th> 
                                        <th>Centro de Verificación</th>
                                        <th>Tipo</th>
                                        <th>Dictamen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      	
                                        while ($rP = mysqli_fetch_array($res)){
                                            // die(var_dump($res));
                                    ?>
                                        <tr>
                                            <td><?php echo utf8_encode($rP['idVerificacion']); ?></td>
                                            <td><?php echo utf8_encode($rP['Vehiculo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Periodo']); ?></td>
                                            <td><?php echo utf8_encode($rP['CentroVerificacion']); ?></td>
                                            <td><?php echo utf8_encode($rP['Tipo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Dictamen']); ?></td>					
                                        </tr>
                                                
                                        </tbody>
                                            <?php
                                            		
                                                }
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