
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Reporte';
    include('./../partials/head.php'); 
?>
<body>
    <div class="container-absolute flex">
    <!-- HEADER -->
    <?php include('./../partials/header.php') ?>

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
    <?php include('./../partials/footer.php') ?>
