
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Conductores';
    include('./../partials/head.php'); 
?>

    <div class="container-absolute flex">
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
                        <h3 class="mtop20">Introduzca los siguentes datos</h3>
                        <!-- FORMULARIO -->
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                    <input type="text" name="rfc" id="" class="validate"  required>
                            </div>
                            <div class="input-field">
                                <label>Nombre</label>
                                    <input type="text" name="nombre" id=""  class="validate" required>
                            </div>
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" id="" class="validate" required>
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
                                    <input type="text" name="domicilio" id="" class="validate" required>
                                </div>
                                <div class="input-field">
                                        <label>Antigüedad</label>
                                    <input type="text" name="antiguedad" id="" class="validate" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono de Emergencia</label>
                                    <input type="text" name="telEmergencia" id="" class="validate" required>
                                </div>
                                <select name="sexo">
                                    <option value="" disabled selected>Sexo</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                                <div class="input-field">
                                        <label>Tipo de Sangre</label>
                                    <input type="text" name="sangre" id="" class="validate" required>
                                </div>
                                <div class="input-field">
                                        <label>Restricciones</label>
                                    <input type="text" name="restriccion" id="" class="validate" required>
                                </div>
                                <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include('./../partials/footer.php') ?>
