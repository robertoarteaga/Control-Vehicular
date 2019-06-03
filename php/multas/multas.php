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
                    <p>Multas</p>
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
                        <h3 class="mtop20">Multas</h3>
                        <!-- FORMULARIO -->
                        
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <select name="Vehiculo">
                                    <option value="" disabled selected>Selecciona el ID del vehículo</option>
                                    <?php 
                                        $qVehiculos = "SELECT idVehiculo FROM vehiculos ORDER BY idVehiculo;";
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
                                <select name="Licencia">
                                    <option value="" disabled selected>Selecciona la Licencia</option>
                                    <?php 
                                        $qLicencias = "SELECT Folio FROM licencias;";
                                        $rLicencias = select($qLicencias);
                                        // die(var_dump($rConductor));
                                        while($rP = mysqli_fetch_array($rLicencias)){
                                    ?>
                                    <option value="<?php echo($rP['Folio'])?>"><?php echo($rP['Folio'])?></option>
                                    <?php } ?>
                                </select>
                            <label>Licencia</label>    
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Motivo</label>
                                <input type="text" name="Motivo" id="" class="validate" required>
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Emisor</label>
                                <input type="text" name="Emisor" id="" class="validate" required>
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Monto</label>
                                <input type="text" name="Monto" id="" class="validate" required>
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Descripcion</label>
                                <input type="text" name="Descripcion" id="" class="validate" required>
                            </div>

                            <div class="input-field mtop40">
                                <label for="">Garantía</label>
                                <input type="text" name="Garantia" id="" class="validate" required>
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include('./../partials/footer.php') ?>
