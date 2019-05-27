<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Ver vehiculos';
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
            <p>Vehículos</p>
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
            <div
              class="container-all flex flex-column flex-center center-align"
            >
              <?php
                            $qConductores = "SELECT * FROM vehiculos WHERE Estatus = 1";
                            $rCon = select($qConductores);
                        ?>
              <table
                class="striped centered center-align responsive-table mtop40"
              >
                <thead>
                  <tr>
                    <th>Propietario</th>
                    <th>NIV</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Número de Motor</th>
                    <th>Número de Serie</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            while ($rC = mysqli_fetch_array($rCon)) {
                        ?>
                  <tr>
                    <td><?php echo utf8_encode($rC['Propietario']); ?></td>
                    <td><?php echo utf8_encode($rC['NIV']); ?></td>
                    <td><?php echo utf8_encode($rC['Placa']); ?></td>
                    <td><?php echo utf8_encode($rC['Marca']); ?></td>
                    <td><?php echo utf8_encode($rC['Color']); ?></td>
                    <td><?php echo utf8_encode($rC['numMotor']); ?></td>
                    <td><?php echo utf8_encode($rC['numSerie']); ?></td>
                    <td>
                      <a
                        class="btn light-blue darken-4"
                        href="modificarVehiculos.php?NIV=<?php echo $rC['NIV']; ?>"
                      >
                        Editar
                      </a>
                    </td>
                    <td>
                      <a
                        class="btn red darken-4"
                        href="eliminar.php?NIV=<?php echo $rC['NIV']; ?>"
                      >
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
