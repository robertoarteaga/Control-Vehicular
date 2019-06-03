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
    $multas = $_POST['multas'];
    
    $qInsert= INSERT INTO multas VALUES ("", );
        // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    // die(var_dump($status));
    if($status == 1){
        $pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
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
        $strings_xml = $dom->saveXML("$pathXML/$d.xml");

        
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
