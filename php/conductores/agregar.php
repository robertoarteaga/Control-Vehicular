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




    $qInsert= ('INSERT INTO conductores VALUES ("'.$RFC.'","'.$Nombre.'","'.$FechaNacimiento.'","'.$Firma.'","'.$Domicilio.'","'.$Antiguedad.'","'.$Sexo.'"
        ,"'.$TipoSangre.'","'.$Resticcion.'","'.$TelefonoEmergencia.'",1);');
        // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    // die(var_dump($status));
    if($status == 1){
        $dom = new SimpleXMLElement( '<?xml version = "1.0"
        encoding = "utf-8" ?> <conductores></conductores>' );
        $ing = $dom->addChild('Conductores');
        $ing -> addChild('RFC:',$RFC);
        $ing -> addChild('Domicilio:',$Domicilio);
        $ing -> addChild('Sexo:',$Sexo);
        $ing -> addChild('Tipo de Sangre:',$TipoSangre);
        $xmlData = $dom->saveXML();
        $dom->formatOutput = true;
        $d=$RFC.date('is');
        $strings_xml = $dom->saveXML("C:/xampp/htdocs/Control-Vehicular/temp/$d.xml");

        
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
