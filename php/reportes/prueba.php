<?php

if(isset($_POST['criterio']) || isset($_POST['criterio'])){
$criterio = $_POST['criterio'];
$columna = $_POST['columna'];
die(var_dump($columna));
}