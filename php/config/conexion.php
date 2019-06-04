<?php
// CONEXION DE .ini
function conexion(){
    //mysqli_connect('Servidor','usuario','contraseña','BD');
    $Parametros=parse_ini_file("config.ini");
    $ServerName=$Parametros['Server'];
    $User=$Parametros['UserName'];
    $Password=$Parametros['Password'];
    $DB=$Parametros['DataBase'];
    $Con=mysqli_connect($ServerName,$User,$Password,$DB);
    return $Con;
}

// INSERT UPDATE & DELETE
function consulta($query){
    $conexion  = conexion();
    $res = mysqli_query($conexion,$query);
    return $conexion;
}
// CERRAR CONEXION
function cerrar($conexion){
    mysqli_close($conexion);
}
// CONSULTA SELECT
function select($select){
	$conexion = conexion();
	$result = mysqli_query($conexion,$select);
	// $rows = mysqli_num_rows($select);
	return $result;
}
// TABLA ESPEJO VEHICULOS
function conexionODBCcopia(){
    $info=parse_ini_file("config.ini");
    $dsnC = $info['dsnC']; 
    $userC= $info['userC'];
    $passC= $info['passC'];
    $odbcC = odbc_connect($dsnC,$userC,$passC);
    // die(var_dump($odbcC));
    return $odbcC;
}
function cerrarODBC($conexion){
    odbc_close($conexion);
}
function odbcConsulta($query){
    $conexion  = conexionODBCcopia();
    $consulta = odbc_exec($conexion,$query);
    return $conexion;
}
?>