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
                        <h3 class="mtop20">Introduzca los siguentes datos</h3>
                        <!-- FORMULARIO -->
                        
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <select name="Propietario">
                                    <option value="" disabled selected>Selecciona el RFC</option>
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
                                <label for="">NIV</label>
                                <input type="text" name="NIV" id="" class="validate" required>
                            </div>
                            
                            <div class="input-field mtop40">
                                <label for="">Placa</label>
                                <input type="text" name="Placa" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Tipo</label>
                                <input type="text" name="Tipo" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Color</label>
                                <input type="text" name="Color" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Uso</label>
                                <input type="text" name="Uso" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Puertas</label>
                                <input type="text" name="Puertas" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Marca</label>
                                <input type="text" name="Marca" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Motor</label>
                                <input type="text" name="Motor" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Número de Serie</label>
                                <input type="text" name="Serie" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Modelo</label>
                                <input type="text" name="Modelo" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Combustible</label>
                                <input type="text" name="Combustible" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Año</label>
                                <input type="text" name="Year" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Cilindraje</label>
                                <input type="text" name="Cilindraje" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Transmisión</label>
                                <input type="text" name="Transmision" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Linea</label>
                                <input type="text" name="Linea" id="" class="validate" required>
                            </div>
                            <div class="input-field mtop40">
                                <label for="">Origen</label>
                                <input type="text" name="Origen" id="" class="validate" required>
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include('./../partials/footer.php') ?>
