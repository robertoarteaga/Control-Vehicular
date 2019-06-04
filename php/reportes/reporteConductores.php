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
                        <h4>Reporte de Conductores</h4>
                        <form method="POST" style="width:60%;">
                            <div class="input-field">
                                <label>Criterio</label>
                                <input type="text" name="criterio" id="" class="validate" required>
                            </div>
                            <select name="columna">
                                <option value="" disabled selected>Columna</option>
                                <option value="RFC">RFC</option>
                                <option value="Nombre">Nombre</option>
                                <option value="FechaNacimiento">Fecha de Nacimiento</option>
                                <option value="Domicilio">Domicilio</option>
                                <option value="Antiguedad">Antigüedad</option>
                                <option value="TelEmergencia">Teléfono de Emergencia</option>
                                <option value="Sexo">Sexo</option>
                                <option value="TipoSangre">Tipo de Sangre</option>
                                <option value="Restriccion">Restricción</option>
                            </select>
                            <button type="submit" class="btn waves-effect waves-light mtop20 mbot20 light-blue darken-4">Buscar</button>
                        </form>
                        <?php
                        include('../config/conexion.php');
                            if(isset($_POST['criterio'])){
                                
                            $criterio = $_POST['criterio'];
                            $columna = $_POST['columna'];

                            $sql = 'SELECT * FROM conductores WHERE '.$columna.' LIKE BINARY "%'.$criterio.'%";';
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
                                        <th>RFC</th>
                                        <th>Nombre</th> 
                                        <th>Fecha de nacimiento</th> 
                                        <th>Firma</th>
                                        <th>Domicilio</th>
                                        <th>Antigüedad</th>
                                        <th>Tel Emergencia</th>
                                        <th>Sexo</th>
                                        <th>Tipo de Sangre</th>
                                        <th>Restricción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      	
                                        while ($rP = mysqli_fetch_array($res)){
                                            // die(var_dump($res));
                                    ?>
                                        <tr>
                                            <td><?php echo utf8_encode($rP['RFC']); ?></td>
                                            <td><?php echo utf8_encode($rP['Nombre']); ?></td>
                                            <td><?php echo utf8_encode($rP['FechaNacimiento']); ?></td>
                                            <td><?php echo utf8_encode($rP['Firma']); ?></td>
                                            <td><?php echo utf8_encode($rP['Domicilio']); ?></td>
                                            <td><?php echo utf8_encode($rP['Antiguedad']); ?></td>
                                            <td><?php echo utf8_encode($rP['TelEmergencia']); ?></td>
                                            <td><?php echo utf8_encode($rP['Sexo']); ?></td>
                                            <td><?php echo utf8_encode($rP['TipoSangre']); ?></td>
                                            <td><?php echo utf8_encode($rP['Restriccion']); ?></td>
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