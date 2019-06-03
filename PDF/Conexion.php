<?php

function Conectar (){
    $Parametros=parse_ini_file("Configuracion.ini");
    $Servidor=$Parametros['Server'];
    $User=$Parametros['UserName'];
    $Password=$Parametros['Password'];
    $DB=$Parametros['DataBase'];
    
    $Con=mysqli_connect($Servidor,$User,$Password,$DB);
    return $Con;    
}


function EjecutarConsulta($Con,$SQL){

    $Query=mysqli_query($Con, $SQL) or die (mysqli_error($Con));
    return $Query;
}

function datosafectados($Con){
    echo mysqli_affected_rows($Con);
}

function Close($Con){
    mysqli_close($Con);

}
?>
