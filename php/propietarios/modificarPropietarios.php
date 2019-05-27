<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Modificar propietarios';
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
                                $qConductor = "SELECT * FROM propietarios WHERE RFC = '".$conductor."';";
                                $rConductor = select($qConductor);
                                // die(var_dump($rConductor));
                                while($rC = mysqli_fetch_array($rConductor)){
                                
                        ?>
                        <form action="actualizar.php" method="POST" class="mtop40" style="width:60%;">
                            <div class="input-field mtop40">
                                <label>RFC</label>
                                    <input type="text" name="nrfc" id="" class="validate"  value="<?php echo  $rC['RFC']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Nombre</label>
                                    <input type="text" name="nombre" id=""  class="validate" value="<?php echo utf8_encode($rC['Nombre']); ?>" required>
                            </div>
                                <div class="input-field">
                                        <label>Domicilio</label>
                                    <input type="text" name="domicilio" id="" class="validate" value="<?php echo  utf8_encode($rC['Direccion']); ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Teléfono</label>
                                    <input type="text" name="telefono" id="" class="validate" value="<?php echo  $rC['Telefono']; ?>" required>
                                </div>
                                <div class="input-field">
                                        <label>Correo</label>
                                    <input type="email" name="correo" id="" class="validate" value="<?php echo$rC['Correo']; ?>" required>
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
