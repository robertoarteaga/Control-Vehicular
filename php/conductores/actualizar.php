<?php
include('../config/conexion.php');
if(!isset($_POST['nrfc'])){
    header('location: verConductores.php');
}
    $RFC = $_POST['nrfc'];
    $Nombre = $_POST['nombre'];
    $FechaNacimiento = $_POST['fechaNacimiento'];
    $Firma = $_POST['firma'];
    $Domicilio = $_POST['domicilio'];
    $Antiguedad = $_POST['antiguedad'];
    $Sexo = $_POST['sexo'];
    $TipoSangre = $_POST['sangre'];
    $Resticcion = $_POST['restriccion'];
    $TelefonoEmergencia = $_POST['telEmergencia'];

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


    $qInsert= ('UPDATE conductores SET RFC = "'.$RFC.'", Nombre = "'.$Nombre.'", FechaNacimiento = "'.$FechaNacimiento.'", Firma = "'.$Firma.'", Domicilio = "'.$Domicilio.'", Antiguedad = "'.$Antiguedad.'", Sexo = "'.$Sexo.'", TipoSangre = "'.$TipoSangre.'", Restriccion = "'.$Resticcion.'", TelEmergencia = "'.$TelefonoEmergencia.'" WHERE RFC = "'.$RFC.'";');
    // die(var_dump($qInsert));
                                // die(var_dump($qInsert));
    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    header('location: verConductores.php');

?>
