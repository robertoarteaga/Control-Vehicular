<?php
    session_start();
    
    include($connectionPath);
    $session=($_SESSION['usuario']);
    
    if(!isset($_SESSION['usuario'])){
		header('location: index.php');
    }
	if(is_null($_SESSION['usuario']) && $_SESSION['usuario'] == 0){
		header('location: index.php');
	}
	$qUser = "SELECT * FROM usuarios WHERE username = '".$_SESSION['usuario']."';";
    $rUser = select($qUser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <?php
        if(count(explode('/',$_SERVER['REQUEST_URI'])) == 3) {
    ?>
            <link rel="stylesheet" href="css/materialize.min.css">
            <link rel="stylesheet" href="css/style.css">
            <script src="js/jquery.js"></script>
            <script src="js/functions.js"></script>
    <?php
        } else {
    ?>
            <link rel="stylesheet" href="./../../css/materialize.min.css">
            <link rel="stylesheet" href="./../../css/style.css">
            <script src="./../../js/jquery.js"></script>
            <script src="./../../js/functions.js"></script>
    <?php            
        }
    ?>
</head>
<body>

