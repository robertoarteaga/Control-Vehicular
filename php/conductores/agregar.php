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
    $RFC = $_POST['rfc'];
    $Nombre = $_POST['nombre'];
    $FechaNacimiento = $_POST['fechaNacimiento'];
    $Domicilio = $_POST['domicilio'];
    $Antiguedad = $_POST['antiguedad'];
    $Sexo = $_POST['sexo'];
    $TipoSangre = $_POST['sangre'];
    $Resticcion = $_POST['restriccion'];
    $TelefonoEmergencia = $_POST['telEmergencia'];

    $newFileName = '';
    if(isset($_FILES['firma']) && $_FILES['firma']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['firma']['tmp_name'];
        $fileName = $_FILES['firma']['name'];
        $fileSize = $_FILES['firma']['size'];
        $fileType = $_FILES['firma']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('jpg', 'jpge', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../../img/users/signature/';
            $destPath = $uploadFileDir . $newFileName;
        
            if(move_uploaded_file($fileTmpPath, $destPath)) {
                $message ='File is successfully uploaded.';
            }
            else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
            
    }

    $qInsert= ('INSERT INTO conductores VALUES ("'.$RFC.'","'.$Nombre.'","'.$FechaNacimiento.'","'.$newFileName.'","'.$Domicilio.'","'.$Antiguedad.'","'.$Sexo.'"
        ,"'.$TipoSangre.'","'.$Resticcion.'","'.$TelefonoEmergencia.'",1);');
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
        $d=$RFC.'_'.date('is');
        $strings_xml = $dom->saveXML("$pathXML/conductores/$d.xml");

        
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
