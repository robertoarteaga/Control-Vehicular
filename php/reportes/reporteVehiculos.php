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
                        <h4>Reporte de Vehículos</h4>
                        <form method="POST" style="width:60%;">
                            <div class="input-field">
                                <label>Criterio</label>
                                <input type="text" name="criterio" id="" class="validate" required>
                            </div>
                            <select name="columna">
                                <option value="" disabled selected>Columna</option>
                                <option value="idVehiculo">idVehiculo</option>  
                                <option value="Propietario">Propietario</option>
                                <option value="NIV">NIV</option>
                                <option value="Placa">Placa</option>
                                <option value="Tipo">Tipo</option>
                                <option value="Color">Color</option>
                                <option value="Uso">Uso</option>
                                <option value="numPuerta">numPuerta</option>
                                <option value="Marca">Marca</option>
                                <option value="numMotor">numMotor</option>
                                <option value="numSerie">numSerie</option>
                                <option value="Monto">Modelo</option>
                                <option value="Combustible">Combustible</option>
                                <option value="Year">Year</option>
                                <option value="Transmision">Transmision</option>
                                <option value="Linea">Linea</option>
                                <option value="Origen">Origen</option>
                            </select>
                            <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                        include('../config/conexion.php');
                            if(isset($_POST['criterio'])){
                                
                            $criterio = $_POST['criterio'];
                            $columna = $_POST['columna'];

                            $sql = 'SELECT * FROM vehiculos WHERE '.$columna.' LIKE BINARY "%'.$criterio.'%";';
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
                                        <th>ID Vehiculo</th>
                                        <th>Propietario</th> 
                                        <th>NIV</th> 
                                        <th>Placa</th>
                                        <th>Tipo</th>
                                        <th>Color</th>
                                        <th>Num de puertas</th>
                                        <th>Marca</th>
                                        <th>Num Motor</th>
                                        <th>Num Serie</th>
                                        <th>Modelo</th>
                                        <th>Combustible</th> 
                                        <th>Año</th>
                                        <th>Cilindraje</th>
                                        <th>Transmisión</th>
                                        <th>Linea</th>
                                        <th>Origen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      	
                                        while ($rP = mysqli_fetch_array($res)){
                                            // die(var_dump($res));
                                    ?>
                                        <tr>
                                            <td><?php echo utf8_encode($rP['idVehiculo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Propietario']); ?></td>
                                            <td><?php echo utf8_encode($rP['NIV']); ?></td>
                                            <td><?php echo utf8_encode($rP['Placa']); ?></td>
                                            <td><?php echo utf8_encode($rP['Tipo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Color']); ?></td>
                                            <td><?php echo utf8_encode($rP['numPuerta']); ?></td>
                                            <td><?php echo utf8_encode($rP['Marca']); ?></td>
                                            <td><?php echo utf8_encode($rP['numMotor']); ?></td>
                                            <td><?php echo utf8_encode($rP['numSerie']); ?></td>
                                            <td><?php echo utf8_encode($rP['Modelo']); ?></td>
                                            <td><?php echo utf8_encode($rP['Combustible']); ?></td>
                                            <td><?php echo utf8_encode($rP['Year']); ?></td>
                                            <td><?php echo utf8_encode($rP['Cilindraje']); ?></td>
                                            <td><?php echo utf8_encode($rP['Transmision']); ?></td>
                                            <td><?php echo utf8_encode($rP['Linea']); ?></td>
                                            <td><?php echo utf8_encode($rP['Origen']); ?></td>
					
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