
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Ver conductores';
    include('./../partials/head.php'); 
?>
    <div class="container-absolute flex">
      <!-- HEADER -->
      <?php include('./../partials/header.php') ?>
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
              <table class="striped centered center-align responsive-table mtop40">
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
                                    <a class="btn light-blue darken-4" href="modificarConductores.php?RFC=<?php echo $rC['RFC']; ?>">
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
    <?php include('./../partials/footer.php') ?>