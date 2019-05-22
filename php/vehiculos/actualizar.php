<?php
include('../config/conexion.php');
die(var_dump($_POST['NIV']));
die();
if(!isset($_POST['NIV'])){
    die(var_dump($_POST['NIV']));
    header('location: verConductores.php');
}
    $Propietario = $_POST['Propietario'];
    $NIV = $_POST['NIV'];
    $Placa = $_POST['Placa'];
    $Tipo = $_POST['Tipo'];
    $Color = $_POST['Color'];
    $Uso = $_POST['Uso'];
    $Puerta = $_POST['Puertas'];
    $Marca = $_POST['Marca'];
    $Motor = $_POST['Motor'];
    $Serie = $_POST['Serie'];
    $Modelo = $_POST['Modelo'];
    $Combustible = $_POST['Combustible'];
    $Year = $_POST['Year'];
    $Cilindraje = $_POST['Cilindraje'];
    $Transmision = $_POST['Transmision'];
    $Linea = $_POST['Linea'];
    $Origen = $_POST['Origen'];

    $qInsert= ('UPDATE vehiculos SET idVehiculo = "", Propietario = "'.$Propietario.'", Placa = "'.$Placa.'","'.$Tipo.'","'.$Color.'","'.$Uso.'","'.$Puerta.'"
    ,"'.$Marca.'","'.$Motor.'","'.$Serie.'","'.$Modelo.'","'.$Combustible.'","'.$Year.'","'.$Cilindraje.'","'.$Transmision.'","'.$Linea.'","'.$Origen.'";');
    // die(var_dump($qInsert));
                                // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    header('location: verConductores.php');

?>