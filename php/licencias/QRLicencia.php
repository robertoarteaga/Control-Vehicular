<?php

require "phpqrcode/qrlib.php";

$dir='temp/';

$N=1;
$date = date('m/d/Y h:i:s a', time());
$filename= $dir."QRLicencias.$N.png";
$tamano=6;
$level ='M';
$framSize= 3;
$contenido="Numero de Licencia:" .$N."\n
           Fecha de Expedición:" .$date."\n
				   Fecha de Vencimiento:" .'5 años xD'."\n
				   Tipo de Licencia:" .'1';

QRcode::png($contenido,$filename,$level,$tamano,$framSize);


?>
