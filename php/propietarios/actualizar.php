<?php
include('../config/conexion.php');
if(!isset($_POST['nrfc'])){
    header('location: verPropietarios.php');
}
    
$RFC = $_POST['nrfc'];
$Nombre = $_POST['nombre'];
$Domicilio = $_POST['domicilio'];
$Correo = $_POST['correo'];
$Telefono = $_POST['telefono'];

    $qInsert= ('UPDATE propietarios SET RFC = "'.$RFC.'", Nombre = "'.$Nombre.'", Direccion = "'.$Domicilio.'", Telefono = "'.$Telefono.'", Correo = "'.$Correo.'" WHERE RFC= "'.$RFC.'";');
    // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    header('location: verPropietarios.php');

?>