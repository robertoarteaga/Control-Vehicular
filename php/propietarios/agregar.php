<?php
session_start();
include('../config/conexion.php');
$session=($_SESSION['usuario']);

if(!isset($_SESSION['usuario'])){
    header('location: ../index.php');
}
if(is_null($_SESSION['usuario']) && $_SESSION['usuario'] == 0){
    header('location: ../index.php');
}

if(isset($_POST['rfc'])){
                            $RFC = $_POST['rfc'];
                            $Nombre = $_POST['nombre'];
                            $Domicilio = $_POST['domicilio'];
                            $Correo = $_POST['correo'];
                            $Telefono = $_POST['telefono'];
                            
                            $qInsert= ('INSERT INTO propietarios VALUES ("'.$RFC.'","'.$Nombre.'","'.$Domicilio.'","'.$Telefono.'","'.$Correo.'");');
                                // die(var_dump($qInsert));
                            $res=consulta($qInsert);
                            $status = mysqli_affected_rows($res);
                            // die(var_dump($status));
                            if($status == 1){
                                echo'<script type="text/javascript">
                                        window.location.href="propietarios.php";
                                        </script>';
                            }else{
                                echo'<script type="text/javascript">
                                        alert("Error en los datos");
                                        </script>';
                            }
                        } else {
                            header('location: propietarios.php');
                        }
                        ?>