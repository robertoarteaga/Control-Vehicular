
<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Dar de baja conductores';
    include('./../partials/head.php'); 
?>

    <div class="container-absolute flex">
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
                <div class="container-card flex ">
                    <div class="container-all flex flex-column flex-center center-align">
                        <h3 class="mtop40">Ingrese el RFC del Conductor a Eliminar</h3>
                        <form action="eliminar.php" method="GET" style="width:50%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                <input type="text" name="rfc" id="" class="validate" required>
                            </div>
                            <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4" type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('./../partials/footer.php') ?>