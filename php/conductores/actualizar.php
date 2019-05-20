<?php
include('../config/conexion.php');
if(!isset($_GET['rfc'])){
    header('location: verConductores.php');
}
    $RFC = $_POST['rfc'];
    $Nombre = $_POST['nombre'];
    $FechaNacimiento = $_POST['fechaNacimiento'];
    $Firma = $_POST['firma'];
    $Domicilio = $_POST['domicilio'];
    $Antiguedad = $_POST['antiguedad'];
    $Sexo = $_POST['sexo'];
    $TipoSangre = $_POST['sangre'];
    $Resticcion = $_POST['restriccion'];
    $TelefonoEmergencia = $_POST['telEmergencia'];

    $qInsert= ('UPDATE conductores SET RFC = "'.$RFC.'", Nombre = "'.$Nombre.'", FechaNacimiento = ');
                                // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);

?>