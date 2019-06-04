<?php
    $connectionPath = './../config/conexion.php';
    $title = 'Reporte';
    include('./../partials/head.php'); 
?>
    <div class="container-absolute flex">
        <!-- HEADER -->
        <?php include('./../partials/header.php') ?>

        <!-- CARD -->
        <div class="container-right flex flex-column">
            <div class="container-header flex">
                <div class="container-nav container-info flex">
                </div>
                <div class="container-nav container-logo flex"></div>
                <div class="container-nav container-name flex">
                </div>
            </div>
            <div class="container-content flex">
                <div class="container-card flex">
                    <div class="container-all flex flex-column flex-center center-align">
                        <h4>Reporte de Tenencias</h4>
                        <form method="POST" style="width:60%;">
                            <div class="input-field">
                                <label>Criterio</label>
                                <input type="text" name="criterio" id="" class="validate" required>
                            </div>
                            <select name="columna">
                                <option value="" disabled selected>Columna</option>
                                <option value="Folio">Folio</option>
                                <option value="Vehiculo">Vehículo</option>
                                <option value="Periodo">Periodo</option>
                                <option value="FechaPago">Fecha de Pago</option>
                                <option value="Monto">Monto</option>
                                <option value="Antiguedad">Antigüedad</option>
                                <option value="Descuento">Descuento</option>
                            </select>
                            <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                        include('../config/conexion.php');
                            if(isset($_POST['criterio'])){
                                
                            $criterio = $_POST['criterio'];
                            $columna = $_POST['columna'];

                            $sql = 'SELECT * FROM tenencias WHERE '.$columna.' LIKE BINARY "%'.$criterio.'%";';
                            // die(var_dump($sql));
                            $res = select($sql);
                            $rows = mysqli_num_rows($res);
                                    if($rows == 0){
                                        print("No se encontraron resultados.");
                                    }else{
                            ?>
                            <table class="striped centered center-align responsive-table mtop40">
                                <thead>
                                    <tr>
                                        <th>Folio</th>
                                        <th>Vehículo</th> 
                                        <th>Periodo</th> 
                                        <th>Fecha de pago</th>
                                        <th>Monto</th>
                                        <th>Antigüedad</th>
                                        <th>Descuento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      	
                                        while ($rP = mysqli_fetch_array($res)){
                                            // die(var_dump($res));
                                    ?>
                                        <tr>
                                            <td><?php echo utf8_encode($rP['Folio']); ?></td>
                                            <td><?php echo utf8_encode($rP['Vehiculo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Periodo']); ?></td>
                                            <td><?php echo utf8_encode($rP['FechaPago']); ?></td>
                                            <td><?php echo utf8_encode($rP['Monto']); ?></td>
                                            <td><?php echo utf8_encode($rP['Antiguedad']); ?></td>
                                            <td><?php echo utf8_encode($rP['Descuento']); ?></td>
					
                                        </tr>
                                                
                                        </tbody>
                                            <?php
                                            		
                                                }
                                            }
                                        }
                                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>