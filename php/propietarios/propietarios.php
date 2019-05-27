<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Propietarios';
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
                    <p>Propietarios</p>
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
                                <div class="input-field">
                                        <label>Domicilio</label>
                                    <input type="text" name="domicilio" id="" class="validate" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono</label>
                                    <input type="text" name="telefono" id="" class="validate" required>
                                </div>
                                <div class="input-field">
                                        <label>Correo Electrónico</label>
                                    <input type="email" name="correo" id="" class="validate" required>
                                </div>
                                <button class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('./../partials/footer.php') ?>
