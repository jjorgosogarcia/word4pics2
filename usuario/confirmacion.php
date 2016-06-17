<?php
require '../clases/AutoCarga.php';
$op = Request::get("op");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Word4Pics</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/estiloForm.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    </head>
    <body class="index">
        <div id="page-wrapper">
        <div class="logo"></div>
        <div  class="login-block">
            <?php if($op=="mail"){?> 
                <p>Se ha enviado un correo de confirmación a su dirección de email</p>
            <?php }else if($op="activado"){ ?>
                <p>Se han registrado los cambios</p>
            <?php } ?>
                <p>En 5 segundos volverá a la página inicial</p>
                 <?php header( "refresh:5; url=../login/login.php" ); ?>
        </div>
        </div>
    </body>
</html>
