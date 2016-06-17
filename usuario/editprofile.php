<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");
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
    </head>
    <body class="index">
        <div id="page-wrapper">

            <header id="header" class="alt">
                <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.php">Perfil</a></li>
                        <li><a href="../juego/index.php" >Juego</a></li>
                        <li><a href="../nivel/index.php">Subir nivel</a></li>
                        <li><a href="../php/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>


            <div class="contenedorProfile edit">
                <div class="userProfile adv-round-rectangle" >
                    <div id="fotoPerfil" class="stackone">
                        <?php if ($usuarios->getAvatar() !== "NULL") { ?>
                            <img class="avatarPerfil"  src="../avatares/<?= $usuarios->getAvatar() ?>"/>
                        <?php } else { ?>
                            <img class="avatarPerfil"  src="../avatares/nofoto.jpg"/>
                        <?php } ?>
                    </div>
                    <form action="../php/phpeditprofile.php" method="POST" enctype="multipart/form-data" id="formEditar">
                        <input type="hidden" name="email" value="<?php echo $usuarios->getCorreo() ?>" /><br />
                        <input type="file" name="nuevaImagen" value="" /><br />
                        <span class="labelProfile">Nombre <input class="inputEdit" type="text" name="nombre" value="<?php echo $usuarios->getNombre(); ?>"/></span>
                        <span class="labelProfile">Apellidos <input class="inputEdit" required  type="text" name="apellidos" value="<?php echo $usuarios->getApellidos(); ?>" /></span>
                        <span class="labelProfile">Ciudad<input class="inputEdit" required  type="text" name="ciudad" value="<?php echo $usuarios->getCiudad(); ?>" /></span>          
                        <input type="hidden" name="pkID" value="<?php echo $usuarios->getCorreo(); ?>" /><br/>
                        <input class="botonEditar button azul" type="submit" value="editar"/>
                    </form>
                </div>
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

    </body>
</html>
<?php
$bd->close();
