<?php
include('../config/conexion.php');

if(!isset($_POST['NIV'])){
    // die(var_dump($_POST['NIV']));
    header('location: verConductores.php');
}
    $RFC = $_POST['id'];
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
    $d=$RFC.'_'.date('is');
    $strings_xml = $dom->saveXML("$pathXML/vehiculos/modificaciones/$d.xml");

    $qInsert= ('UPDATE vehiculos SET Propietario = "'.$Propietario.'", Placa = "'.$Placa.'", Tipo = "'.$Tipo.'", Color = "'.$Color.'", Uso = "'.$Uso.'", numPuerta = "'.$Puerta.'"
    , Marca = "'.$Marca.'",numMotor = "'.$Motor.'",numSerie = "'.$Serie.'",Modelo = "'.$Modelo.'",Combustible = "'.$Combustible.'",Year = "'.$Year.'",Cilindraje = "'.$Cilindraje.'", Transmision = "'.$Transmision.'", Linea = "'.$Linea.'", Origen = "'.$Origen.'" WHERE idVehiculo ="'.$id.'";');
    // die(var_dump($qInsert));
    
    $pathPDF = parse_ini_file('./../config/config.ini')['pathPDF'];
    require('../../PDF/Cambios.php');

    $res=consulta($qInsert);
    odbcConsulta($qInsert);
    $status = mysqli_affected_rows($res);
    header('location: verVehiculos.php');

?>
