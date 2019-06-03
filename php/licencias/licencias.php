
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Expedición de licencias';
    include('./../partials/head.php'); 
?>
    <div class="container-absolute flex">
        <?php include('./../partials/header.php') ?>
        <!-- CARD -->
        <div class="container-right flex flex-column">
            <div class="container-header flex">
                <div class="container-nav container-info flex">
                    <!-- UBICACIÓN DEL USUARIO -->
                    <p>Expedición de licencias</p>
                </div>
                <div class="container-nav container-logo flex"></div>
                <div class="container-nav container-name flex">
                    <!-- NOMBRE DEL USUARIO -->
                    <p><?php echo $_SESSION['usuario']?></p>
                </div>
            </div>
            <div class="container-content flex">
                <!-- CONTAINER CARD -->
                <div class="container-card flex">
                    <div class="container-all flex flex-column flex-center center-align">
                        <h3 class="mtop20">Introduzca los siguentes datos</h3>
                        <!-- FORMULARIO -->
                        <form action="agregar.php" method="POST" style="width:60%;" enctype="multipart/form-data">
                            <select name="RFC">
                                <option value="" disabled selected>Selecciona el conductor</option>
                                <?php 
                                    $qVehiculos = "SELECT * FROM conductores WHERE Estatus = 1";
                                    $rVehiculos = select($qVehiculos);
                                    // die(var_dump($rConductor));
                                    while($rP = mysqli_fetch_array($rVehiculos)){
                                        print_r($rp);
                                ?>
                                <option value="<?php echo($rP['RFC'])?>"><?php echo($rP['RFC'])?></option>
                                <?php } ?>
                            </select>
                            <div class="input-field">
                                <select class="custom-select" name="tipo-licencia">
                                    <option selected disabled>Tipo de licencia</option>
                                    <option value="A">Licencia tipo A</option>
                                    <option value="B">Licencia tipo B</option>
                                    <option value="C">Licencia tipo C</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <select class="custom-select" name="donador">
                                    <option selected disabled>Es donador</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>                            
                            </div>
                            <div class="file-field input-field">
                                    <div class="btn light-blue darken-4">
                                        <span>Subir</span>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" name="foto" type="text" placeholder="Foto del conductor.">
                                    </div>
                            </div>
                            <div class="input-field mtop40">
                                <select name="Vigencia">
                                    <option value="" disabled selected>Selecciona la vigencia</option>
                                    <option value="3">3 años</option>
                                    <option value="5">5 años</option>
                                </select>
                            <label>Vigencia</label>    
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('./../partials/footer.php') ?>