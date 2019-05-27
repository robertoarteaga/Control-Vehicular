<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Modificar vehiculos';
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
                        <h3 class="mtop40">Introduzca el NIV del vehículo a modificar</h3>
                        <form method="GET">
                            <input type="text" name="NIV" id="" class="validate">
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                        <!-- FORMULARIO -->
                        <?php
                            if(isset($_GET['NIV'])){
                                $vehiculo = $_GET['NIV'];
                                $qVehiculo = "SELECT * FROM vehiculos WHERE NIV = '".$vehiculo."';";
                                $rVehiculo = select($qVehiculo);
                                // die(var_dump($qVehiculo));
                                while($rV = mysqli_fetch_array($rVehiculo)){
                                
                        ?>
                        <form action="actualizar.php" method="POST" style="width:50%;">
                        <div class="input-field mtop40">
                        <label for="">ID</label>
                                <input type="text" name="id" id="" class="validate" value="<?php echo($rV['idVehiculo'])?>" required>
                        </div> 
                        <div class="input-field mtop40">
                        <label for="">NIV</label>
                                <input type="text" name="NIV" id="" class="validate" value="<?php echo($rV['NIV'])?>" required>
                        </div> 
                        <div class="input-field mtop40">
                                <select name="Propietario">
                                    <option value="<?php echo($rV['Propietario'])?>" selected><?php echo($rV['Propietario']) ?></option>
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
                                <label for="">Placa</label>
                                <input type="text" name="Placa" id="" class="validate" value="<?php echo($rV['Placa'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Tipo</label>
                                <input type="text" name="Tipo" id="" class="validate" value="<?php echo($rV['Tipo'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Color</label>
                                <input type="text" name="Color" id="" class="validate" value="<?php echo($rV['Color'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Uso</label>
                                <input type="text" name="Uso" id="" class="validate" value="<?php echo($rV['Uso'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Puertas</label>
                                <input type="text" name="Puertas" id="" class="validate" value="<?php echo($rV['numPuerta'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Marca</label>
                                <input type="text" name="Marca" id="" class="validate" value="<?php echo($rV['Marca'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Motor</label>
                                <input type="text" name="Motor" id="" class="validate" value="<?php echo($rV['numMotor'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Serie</label>
                                <input type="text" name="Serie" id="" class="validate" value="<?php echo($rV['numSerie'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Modelo</label>
                                <input type="text" name="Modelo" id="" class="validate" value="<?php echo($rV['Modelo'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Combustible</label>
                                <input type="text" name="Combustible" id="" class="validate" value="<?php echo($rV['Combustible'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Año</label>
                                <input type="text" name="Year" id="" class="validate" value="<?php echo($rV['Year'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Cilindraje</label>
                                <input type="text" name="Cilindraje" id="" class="validate" value="<?php echo($rV['Cilindraje'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Transmisión</label>
                                <input type="text" name="Transmision" id="" class="validate" value="<?php echo($rV['Transmision'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Linea</label>
                                <input type="text" name="Linea" id="" class="validate" value="<?php echo($rV['Linea'])?>" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Origen</label>
                                <input type="text" name="Origen" id="" class="validate" value="<?php echo($rV['Origen'])?>" required>
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('./../partials/footer.php') ?>
