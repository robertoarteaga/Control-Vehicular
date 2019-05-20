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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Inicio</title>
    <link rel="stylesheet" href="../../css/materialize.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
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
              <a href="#" class="btn-menu"
                >Menu<i class="icono fa fa-bars"></i
              ></a>

              <ul class="menu">
                <li><a href="../../main.php">Inicio</a></li>
                <li>
                  <a href="#"
                    >Conductores<span
                      class="icono derecha fontawesome-caret-down"
                    ></span
                  ></a>
                  <ul>
                    <li><a href="conductores.php">Altas</a></li>
                    <li><a href="eliminarConductores.php">Bajas</a></li>
                    <li><a href="modificarConductores.php">Modificaciones</a></li>
                    <li><a href="#">Ver</a></li>
                  </ul>
                </li>
                <li><a href="#">Licencias</a></li>
                <li><a href="#">Multas</a></li>
                <li>
                  <a href="#"
                    >Propietarios<span
                      class="icono derecha fontawesome-caret-down"
                    ></span
                  ></a>
                  <ul>
                    <li><a href="#">Altas</a></li>
                    <li><a href="#">Bajas</a></li>
                    <li><a href="#">Modificaciones</a></li>
                    <li><a href="#">Ver</a></li>
                  </ul>
                </li>
                <li><a href="#">Reportes</a></li>
                <li>
                  <a href="#"
                    >Vehículos<span
                      class="icono derecha fontawesome-caret-down"
                    ></span
                  ></a>
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
            <p>
              <?php
                    
                    while($rU = mysqli_fetch_array($rUser)){

                        echo($rU['username']);
                    }?>
            </p>
          </div>
        </div>
        <div class="container-content flex">
          <!-- CONTAINER CARD -->
          <div class="container-card flex">
            <div class="container-title center-align">
              <h3 class="mtop20">Datos del conductor</h3>
            </div>
            <div class="container-all flex flex-column flex-center center-align">
              <?php
                            $qConductores = "SELECT * FROM conductores WHERE Estatus = 1";
                            $rCon = select($qConductores);
                        ?>
              <table class="striped centered center-align mtop40">
                    <thead>
                        <tr>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <th>Fecha de Nacimiento</th> 
                            <th>Domicilio</th>
                            <th>Antigüedad</th> 
                            <th>Teléfono</th>
                            <th>Sexo</th>
                            <th>Acciones</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rC = mysqli_fetch_array($rCon)) {
                        ?>
                            <tr>
                                <td><?php echo utf8_encode($rC['RFC']); ?></td>
                                <td><?php echo utf8_encode($rC['Nombre']); ?></td>
                                <td><?php echo utf8_encode($rC['FechaNacimiento']); ?></td>
                                <td><?php echo utf8_encode($rC['Domicilio']); ?></td>
                                <td><?php echo utf8_encode($rC['Antiguedad']); ?></td>
                                <td><?php echo utf8_encode($rC['TelEmergencia']); ?></td>
                                <td><?php echo utf8_encode($rC['Sexo']); ?></td>
                                <td>
                                    <a class="btn light-blue darken-4" href="editar.php?rfc=<?php echo $rA['RFC']; ?>">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a class="btn red darken-4" href="eliminar.php?rfc=<?php echo $rC['RFC']; ?>">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                            
                        <?php
                            }
                        ?>
                            </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
