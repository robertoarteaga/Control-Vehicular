<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Vehiculos';
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
                    <p>Verificaciones</p>
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
                        <h3 class="mtop20">Verificaciones</h3>
                        <!-- FORMULARIO -->
                        
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <select name="Vehiculo">
                                    <option value="" disabled selected>Selecciona el ID vehicular</option>
                                    <?php 
                                        $qVehiculos = "SELECT idVehiculo FROM vehiculos WHERE Estatus = 1;";
                                        $rVehiculos = select($qVehiculos);
                                        // die(var_dump($rConductor));
                                        while($rP = mysqli_fetch_array($rVehiculos)){
                                    ?>
                                    <option value="<?php echo($rP['idVehiculo'])?>"><?php echo($rP['idVehiculo'])?></option>
                                    <?php } ?>
                                </select>
                            <label>Vehículo</label>    
                            </div>
                            
                            <div class="input-field mtop40">
                                <select name="Periodo">
                                    <option value="" disabled selected>Selecciona el Periodo</option>
                                    <option value="2019-1">Enero - Junio</option>
                                    <option value="2019-1">Julio - Diciembre</option>
                                </select>
                            <label>Periodo</label>    
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Centro de Verificación</label>
                                <input type="text" name="Centro" id="" class="validate" required>
                            </div>
                            
                            <div class="input-field mtop40">
                                <select name="Tipo">
                                    <option value="" disabled selected>Selecciona el Tipo</option>
                                    <option value="Ordinario">Ordinario</option>
                                    <option value="Extraordinario">Extraordinario</option>
                                </select>
                            <label>Tipo</label>    
                            </div>

                            <div class="input-field mtop40">
                                <select name="Dictamen">
                                    <option value="" disabled selected>Selecciona el Dictamen</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                            <label>Dictamen</label>    
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include('./../partials/footer.php') ?>
