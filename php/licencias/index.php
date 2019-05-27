
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
                        <form action="agregar.php" method="POST" style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                <input type="text" name="rfc" id="rfc" class="validate"  required>
                            </div>
                            <div class="input-field">
                                <select class="custom-select">
                                    <option selected disabled>Tipo de licencia</option>
                                    <option value="A">Licencia tipo A</option>
                                    <option value="B">Licencia tipo B</option>
                                    <option value="C">Licencia tipo C</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <select class="custom-select">
                                    <option selected disabled>Es donador</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>                            
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('./../partials/footer.php') ?>