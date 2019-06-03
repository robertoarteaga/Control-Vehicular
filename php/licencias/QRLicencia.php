<?php
include("Conexion.php");
$Con=Conectar();
$result = EjecutarConsulta($Con,"SELECT * FROM licencias l, conductores c WHERE l.FolioLicencia = $Folio AND c.RFC = l.Conductor;");
$id=mysqli_insert_id($Con);
require "phpqrcode/qrlib.php";

$dir='temp/';

if(!file_exists($dir)){
mkdir ($dir);}

$N=$Folio;

$filename= $dir."QRLicencias.$Folio.png";
$tamano=6;
$level ='M';
$framSize= 3;
$contenido="Numero de Licencia:" .$Folio."\n
           Fecha de Expedición:" .$Fechaex."\n
				   Fecha de Vencimiento:" .$Fechaven."\n
				   Tipo de Licencia:" .$Tipo;

QRcode::png($contenido,$filename,$level,$tamano,$framSize);


Cerrar($Con);


?>
