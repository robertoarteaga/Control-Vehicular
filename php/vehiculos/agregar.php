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
    
    $qInsert= ('INSERT INTO vehiculos VALUES ("","'.$Propietario.'","'.$NIV.'","'.$Placa.'","'.$Tipo.'","'.$Color.'","'.$Uso.'","'.$Puerta.'"
        ,"'.$Marca.'","'.$Motor.'","'.$Serie.'","'.$Modelo.'","'.$Combustible.'","'.$Year.'","'.$Cilindraje.'","'.$Transmision.'","'.$Linea.'","'.$Origen.'","1");');
    // die(var_dump($qInsert));
    $res=consulta($qInsert);

    odbcConsulta($qInsert);
    $status = mysqli_affected_rows($res);


    $pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
    $dom = new SimpleXMLElement( '<?xml version = "1.0"
    encoding = "utf-8" ?> <Vehiculos></Vehiculos>' );
    $ing = $dom->addChild('vehiculos');
    $ing -> addChild('Pripuetario:',$Propietario);
    $ing -> addChild('NIV:',$NIV);
    $ing -> addChild('Placa:',$Placa);
    $ing -> addChild('Tipo:',$Tipo);
    $ing -> addChild('Color:',$Color);
    $ing -> addChild('Uso:',$Uso);
    $ing -> addChild('Origen:',$Origen);
    $ing -> addChild('Linea:',$Linea);

    $dom->formatOutput = true;
    
    // die(var_dump($status));
    $owner = $Propietario;
    $pathPDF = parse_ini_file('./../config/config.ini')['pathPDF'];
    $d=$Propietario.'_'.date('is');
    $strings_xml = $dom->saveXML("$pathXML/vehiculos/altas/$d.xml");
    include('../../PDF/vehiculos.php');
    require('../../PDF/Altas.php');

    if($status == 1){
        echo'<script type="text/javascript">
                alert("Vehículo Agregado");
                window.location.href="../../main.php";
                </script>';
    }else{
        echo'<script type="text/javascript">
                alert("Error en los datos");
                </script>';
    }
?>