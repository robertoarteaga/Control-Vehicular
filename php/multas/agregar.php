<?php
session_start();
include('../config/conexion.php');
$session=($_SESSION['usuario']);

if(!isset($_SESSION['usuario'])){
    header('location: index.php');
}
if(is_null($_SESSION['usuario']) && $_SESSION['usuario'] == 0){
    header('location: index.php');
}
    $vehiculo = $_POST['Vehiculo'];
    $licencia = $_POST['Licencia'];
    $motivo = $_POST['Motivo'];
    $emisor = $_POST['Emisor'];
    $monto = $_POST['Monto'];
    $descripcion = $_POST['Descripcion'];
    $garantia = $_POST['Garantia'];

    $qInsert= "INSERT INTO multas VALUES ('','$vehiculo', '$licencia', '$motivo', '$emisor', '' ,$monto, '$descripcion', '$garantia')";

    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    if($status == 1){

        echo'<script type="text/javascript">
                alert("Conductor Agregado");
                window.location.href="../../main.php";
                </script>';
    }else{
        echo'<script type="text/javascript">
                alert("Error en los datos");
                </script>';
    }
?>
