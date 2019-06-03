<?php

$result = EjecutarConsulta($Con,"SELECT * FROM vehiculo  WHERE IdVehiculo = $Id ;");
$id=mysqli_insert_id($Con);
require "phpqrcode/qrlib.php";



$dir='temp/';

if(!file_exists($dir)){
mkdir ($dir);}

$filename= $dir."QRVehiculos.$Id.png";
$tamano=6;
$level ='M';
$framSize= 3;
$contenido="Numero de Vehiculo:" .$Id."\n
           Placa:" .$Placa."\n
				   NIV:" .$NIV."\n
				   Tipo de Vehiculo:" .$Tipo;

QRcode::png($contenido,$filename,$level,$tamano,$framSize);
?>
