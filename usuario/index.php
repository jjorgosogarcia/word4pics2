<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");
//var_dump($idUsuario);
$bd = new DataBase();

$gestor = new ManageProfile($bd);
$usuarios = $gestor->get($idUsuario);
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

        <link href="../css/sweetalert2.css" rel="stylesheet">
    </head>


    <body class="index">
        <div id="page-wrapper">

            <header id="header" class="alt">
                <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
                <nav id="nav">
                    <ul>
                        <li><a class="current">Perfil</a></li>
                        <li><a href="../juego/index.php" >Juego</a></li>
                        <li><a href="../nivel/index.php">Subir nivel</a></li>
                        <li><a href="../php/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>



            <div class="contenedorProfile">
            <?php
                if (Utilidades::isActivo($bd)) {
            ?>
                <div class="userProfile adv-round-rectangle">
                    <div id="fotoPerfil" class="stackone">
                        <?php if ($usuarios->getAvatar() !== "NULL") { ?>
                            <img class="avatarPerfil"  src="../avatares/<?= $usuarios->getAvatar() ?>"/>
                        <?php } else { ?>
                            <img class="avatarPerfil"  src="../avatares/nofoto.jpg"/>
                        <?php } ?>
                    </div>
                    <span class="labelProfile" id="nickProfile"><?php echo $usuarios->getNickname() ?></span>
                    <div id="profileUser">
                        <div id="infoProfile">
                            <span class="labelProfile">Email: <?php echo $usuarios->getCorreo(); ?></span> 
                            <span class="labelProfile">Ciudad: <?php echo $usuarios->getCiudad() ?></span>
                            <span class="labelProfile">Te encuentras en el nivel <?php echo $usuarios->getNivel() ?></span> 
                        </div>

                        <div id="infoProfile2">
                            <span class="labelProfile">Nombre: <?php echo $usuarios->getNombre() ?>  <?php echo $usuarios->getApellidos() ?></span>
                            <span class="labelProfile">Tienes <?php echo $usuarios->getPuntuacion() ?> puntos</span>
                            <span class="labelProfile" id="pistasProfile">Has usado <?php echo $usuarios->getPistascompradas() ?> pistas</span> 

                        </div>

                    </div>                                     
                    <div id="options">
                        <a href='./editprofile.php?ID=<?= $usuarios->getCorreo() ?>' class="button azul">
                            <span class="letraBoton">Editar </span>
                            <i class="fa fa-pencil optionsProfile" id="lapiz" aria-hidden="true"></i>
                        </a>
                        <a href='../php/phpdeletprofile.php'  class="borrar button rojo">
                            <span class="letraBoton">Borrar </span>
                            <i class="fa fa-times" id="cruz" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
                           <?php  } else {
                ?>
                <span class="sinPermiso">Lo sentimos pero no tienes permisos para permanecer aquí</span>
            <?php } ?>
        </div>
        <?php include '../footer.php'; ?>


        <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.dropotron.min.js"></script>
        <script src="../assets/js/jquery.scrolly.min.js"></script>
        <script src="../assets/js/jquery.scrollgress.min.js"></script>
        <script src="../assets/js/skel.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="../assets/js/main.js"></script>
                        <script src="../js/sweetalert2.min.js"></script>

              <script src="../js/borrar.js"></script> 
    </body>
</html>
<?php
$bd->close();
