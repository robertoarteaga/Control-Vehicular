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
    $RFC = $_POST['RFC'];
    $tipo = $_POST['tipo-licencia'];
    $donador = $_POST['donador'];
    $foto = $_POST['foto'];
    $vigencia = $_POST['Vigencia'];
    $date = date('Y-m-d', time());
    $date2 = '';
    if($vigencia == '3') {
        $date2 = date('Y-m-d', strtotime($date.'+ 3 year'));
    } else {
        $date2 = date('Y-m-d',strtotime($date.'+ 5 year'));
    }
    $newFileName = '';
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('jpg', 'jpge', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../../img/users/photo/';
            $destPath = $uploadFileDir . $newFileName;
        
            if(move_uploaded_file($fileTmpPath, $destPath)) {
                $message ='File is successfully uploaded.';
            }
            else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
    }

    $qInsert= "INSERT INTO licencias VALUES ('', '$RFC', '$tipo', '$date', '$date2', '1', '$donador', '$newFileName')";
    


    $res=consulta($qInsert);
    $status = mysqli_affected_rows($res);
    // die(var_dump($status));
    if($status == 1){        
        $pathPDF = parse_ini_file('./../config/config.ini')['pathPDF'];
        $pathXML = parse_ini_file('./../config/config.ini')['pathXML'];
        $dom = new SimpleXMLElement( '<?xml version = "1.0"
        encoding = "utf-8" ?> <Licencias></Licencias>' );
        $ing = $dom->addChild('licencias');
        $ing -> addChild('RFC:',$RFC);
        $ing -> addChild('Tipo:',$tipo);
        $ing -> addChild('Donador:',$donador);
        $ing -> addChild('Vigencia:',$vigencia);
        $xmlData = $dom->saveXML();
        $dom->formatOutput = true;
        $d=$RFC.'_'.date('is');
        $strings_xml = $dom->saveXML("$pathXML/licencias/$d.xml");

        require('../../PDF/Licencia.php');

        echo'<script type="text/javascript">
                alert("Agregado");
                window.location.href="../../main.php";
                </script>';
    }else{
        echo'<script type="text/javascript">
                alert("Error en los datos");
                </script>';
    }
?>
