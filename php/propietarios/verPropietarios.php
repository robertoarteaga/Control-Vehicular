
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Ver propietarios';
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
            <p>Propietarios</p>
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
              <h3 class="mtop20">Datos del Propietario</h3>
            </div>
            <div class="container-all flex flex-column flex-center center-align">
              <?php
                            $qConductores = "SELECT * FROM propietarios WHERE Estatus = 1";
                            $rCon = select($qConductores);
                        ?>
              <table class="striped centered center-align responsive-table mtop40">
                    <thead>
                        <tr>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>Teléfono</th> 
                            <th>Correo</th>
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
                                <td><?php echo utf8_encode($rC['Direccion']); ?></td>
                                <td><?php echo utf8_encode($rC['Telefono']); ?></td>
                                <td><?php echo utf8_encode($rC['Correo']); ?></td>
                                <td>
                                    <a class="btn light-blue darken-4" href="modificarPropietarios.php?RFC=<?php echo $rC['RFC']; ?>">
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
