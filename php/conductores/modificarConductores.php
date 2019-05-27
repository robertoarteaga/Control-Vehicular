
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Modificaciones';
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
                        <h3 class="mtop40">Introduzca el RFC a modificar</h3>
                        <!-- FORMULARIO -->
                        <form method="get" style="width:50%;">
                        <div class="input-field">
                            <label>RFC</label>
                                <input type="text" name="RFC" id="" required class="validate">
                        </div>
                        <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                            if(isset($_GET['RFC'])){
                                $conductor = $_GET['RFC'];
                                $qConductor = "SELECT * FROM conductores WHERE RFC = '".$conductor."';";
                                $rConductor = select($qConductor);
                                // die(var_dump($rConductor));
                                while($rC = mysqli_fetch_array($rConductor)){
                                
                        ?>
                        <form action="actualizar.php" method="POST" class="mtop40" style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                    <input type="text" name="nrfc" id="" class="validate"  value="<?php echo  $rC['RFC']; ?>" disabled>
                            </div>
                            <div class="input-field">
                                <label>Nombre</label>
                                    <input type="text" name="nombre" id=""  class="validate" value="<?php echo utf8_encode($rC['Nombre']); ?>" required>
                            </div>
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" id="" class="validate" value="<?php echo $rC['FechaNacimiento']; ?>" required>
                            <!-- FIRMA -->
                                <div class="file-field input-field">
                                    <p for="">(Opcional)</p>
                                    <div class="btn light-blue darken-4">
                                        <span>Firma</span>
                                        <input type="file" multiple name="firma">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" name="firma" type="text" placeholder="Sube la firma.">
                                    </div>
                                </div>
                                <div class="input-field">
                                        <label>Domicilio</label>
                                    <input type="text" name="domicilio" id="" class="validate" value="<?php echo  utf8_encode($rC['Domicilio']); ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Antigüedad</label>
                                    <input type="text" name="antiguedad" id="" class="validate" value="<?php echo $rC['Antiguedad']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono de Emergencia</label>
                                    <input type="text" name="telEmergencia" id="" class="validate" value="<?php echo  $rC['TelEmergencia']; ?>" required>
                                </div>
                                <select name="sexo">
                                    <option value="" disabled selected>Sexo</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                                <div class="input-field">
                                        <label>Tipo de Sangre</label>
                                    <input type="text" name="sangre" id="" class="validate" value="<?php echo $rC['TipoSangre']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Restricciones</label>
                                    <input type="text" name="restriccion" id="" class="validate" value="<?php echo$rC['Restriccion']; ?>" required>
                                </div>
                                <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Actualizar</button>
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