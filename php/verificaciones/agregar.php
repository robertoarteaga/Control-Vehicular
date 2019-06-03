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
    $periodo = $_POST['Periodo'];
    $centro = $_POST['Centro'];
    $tipo = $_POST['Tipo'];
    $dictamen = $_POST['Dictamen'];

    $qInsert= "INSERT INTO verificaciones VALUES ('','$vehiculo', $periodo, '$centro', '$tipo', '$dictamen')";
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    if($status == 1){
        $pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
        $dom = new SimpleXMLElement( '<?xml version = "1.0"
        encoding = "utf-8" ?> <conductores></conductores>' );
        $ing = $dom->addChild('Conductores');
        $ing -> addChild('Vehiculo:',$vehiculo);
        $ing -> addChild('Periodo:',$periodo);
        $ing -> addChild('centro verificador:',$centro);
        $ing -> addChild('Tipo:',$tipo);
        $ing -> addChild('Dictamen', $dictamen);
        $xmlData = $dom->saveXML();
        $dom->formatOutput = true;
        $d=$RFC.'_'.date('is');
        $strings_xml = $dom->saveXML("$pathXML/verificaciones/$d.xml");

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
