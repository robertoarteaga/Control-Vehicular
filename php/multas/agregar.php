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
    $date = date('m/d/Y h:i:s a', time());

    $qInsert= "INSERT INTO multas VALUES ('','$vehiculo', '$licencia', '$motivo', '$emisor', '' ,$monto, '$descripcion', '$garantia')";

    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    if($status == 1){
        $pathPDF = parse_ini_file('./../config/config.ini')['pathPDF'];
        $d=$vehiculo.'_'.date('is');
        include('../../PDF/Multas.php');

        $pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
        $dom = new SimpleXMLElement( '<?xml version = "1.0"
        encoding = "utf-8" ?> <multas></multas>' );
        $ing = $dom->addChild('multas');
        $ing -> addChild('Vehiculo:',$vehiculo);
        $ing -> addChild('Licencia:',$licencia);
        $ing -> addChild('Motivo:',$motivo);
        $ing -> addChild('Emisor:',$emisor);
        $ing -> addChild('Monto:',$monto);
        $ing -> addChild('Descripción:',$descripcion);
        $ing -> addChild('Garantia:',$garantia);
        $ing -> addChild('Fecha:',$date);

        $xmlData = $dom->saveXML();
        $dom->formatOutput = true;
        $d=$Vehiculo.'_'.date('is');
        $strings_xml = $dom->saveXML("$pathXML/multas/$d.xml");


        echo'<script type="text/javascript">
                alert("Agregado");
                window.location.href="../../main.php";
                </script>';
    }else{
        echo'<script type="text/javascript">
                alert("Error en los datos");
                </script>';
    }
?>
