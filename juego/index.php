<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");

$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);
$nivelActual = $perfil->getNivel();

$gestor = new ManageLevel($bd);
//$nivel = $gestor->get($nivelActual);

$nivel = $gestor->get($nivelActual);

$palabra = $nivel->getSolucion();
$numero = strlen($palabra);

$op = Request::get("op");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Word4Pics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/estiloForm.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body class="index">
        <div id="page-wrapper">

            <header id="header" class="alt">
                <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
                <nav id="nav">
                    <ul>

                        <li><a href="../usuario/index.php">Perfil</a></li>
                        <li><a class="current">Juego</a></li>
                        <li><a href="../nivel/index.php">Subir nivel</a></li>
                        <li><a href="../php/phplogout.php">Logout</a></li>

                    </ul>
                </nav>
            </header>
            <a name="juego"></a>
            <div class="contenedor">

                <?php
                if (Utilidades::isActivo($bd)) {
                    ?>

                    <div class="cajaUsuario jugador">
                        <div class="fotoUsuario juego">
                            <img class="avatar" src="../avatares/<?php echo $perfil->getAvatar() ?>"/>
                            <span class="nickUsuario"><strong><?php echo $perfil->getNickname() ?></strong></span>
                        </div>

                        <div class="infoPerfil">
                            <span class=""><strong>Nivel: <?php echo $perfil->getNivel() ?></strong></span>
                            <span class="" ><strong id="puntuacion"><?php echo $perfil->getPuntuacion() ?>puntos</strong></span>
                        </div>

                    </div>
                    <div id="background">
                        <div class="divImagenes" id="gallery">
                            <figure class="pic1">
                                <img class="imagenAvidivinar" src="./fotos/<?php echo $nivelActual ?>/<?php echo $nivel->getImagen1() ?>" alt="imagen1" />
                            </figure>
                            <figure class="pic2">
                                <img class="imagenAvidivinar" src="./fotos/<?php echo $nivelActual ?>/<?php echo $nivel->getImagen2() ?>" alt="imagen2" />
                            </figure>
                            <figure class="pic3">
                                <img class="imagenAvidivinar" src="./fotos/<?php echo $nivelActual ?>/<?php echo $nivel->getImagen3() ?>" alt="imagen3" />
                            </figure>    
                            <figure class="pic4">
                                <img class="imagenAvidivinar" src="./fotos/<?php echo $nivelActual ?>/<?php echo $nivel->getImagen4() ?>" alt="imagen4" />
                            </figure>
                        </div>
                    </div>
                    <br/>
                    <div class="divPistas">
                        <form action="../php/phpresolver.php" method="POST">
                            <div class="casillas">

                                <?php for ($i = 0; $i <= $numero - 1; $i++) { ?>
                                    <input class="inputs caja" id='caja<?= $i ?>' name='caja<?= $i ?>' type="text" 
                                           size="1" maxlength="1" autocomplete="off" >
                                       <?php } ?>
                            </div>
                            <input type="submit" value="Resolver" class="button resolver azul" />
                        </form>
                    </div> 
                    <?php if ($op == "fallo") { ?> 
                        <div><span id="errorRespuesta">La respuesta no es correcta, prueba otra vez</span></div>
                    <?php } ?>
                    <!-- Para generar el panel de las letras con las que trabajaremos-->
                    <div id="letras">
                        <img id="A" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/a.jpg"/>
                        <img id="B" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/b.jpg"/>
                        <img id="C" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/c.jpg"/>
                        <img id="D" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/d.jpg"/>
                        <img id="E" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/e.jpg"/>
                        <img id="F" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/f.jpg"/>
                        <img id="G" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/g.jpg"/>
                        <img id="H" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/h.jpg"/>
                        <img id="I" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/i.jpg"/>
                        <img id="J" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/j.jpg"/>
                        <img id="K" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/k.jpg"/>
                        <img id="L" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/l.jpg"/>
                        <img id="M" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/m.jpg"/>
                        <img id="N" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/n.jpg"/>
                        <img id="O" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/o.jpg"/>
                        <img id="P" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/p.jpg"/>
                        <img id="Q" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/q.jpg"/>
                        <img id="R" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/r.jpg"/>
                        <img id="S" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/s.jpg"/>
                        <img id="T" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/t.jpg"/>
                        <img id="U" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/u.jpg"/>
                        <img id="V" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/v.jpg"/>
                        <img id="W" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/w.jpg"/>
                        <img id="X" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/x.jpg"/>
                        <img id="Y" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/y.jpg"/>
                        <img id="Z" class="nomostrar" draggable="true" ondragstart="drag(event)" src="../letras/z.jpg"/>
                    </div>
                    <div class="creador">
                        <span>Nivel creado por: <strong><?php echo $nivel->getUsuario() ?></strong></span><br>
                    </div>
                    <div class="cajaPistas">
                        <span class="cursor pista" id="btdarletra"><img src="../imagenes/iconos/help.png"/><span>Dar letra</span></span>
                        <span class="cursor pista" id="btborrarletra"><img src="../imagenes/iconos/deleteword.png"/><span>Borrar letra</span></span>
                    </div>
                <?php } else {
                    ?>
                    <span class="sinPermiso">Lo sentimos pero no tienes permisos para permanecer aquí</span>
                <?php } ?>
            </div>
        </div>
        <!-- FOOTER -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
            </ul>
            <ul class="copyright copy">
                <li>&copy; Word4Pics</li><li>Desarrollado por Jonathan Jorgoso García con fines académicos</li>
            </ul>
        </footer>   

        <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.dropotron.min.js"></script>
        <script src="../assets/js/jquery.scrolly.min.js"></script>
        <script src="../assets/js/jquery.scrollgress.min.js"></script>
        <script src="../assets/js/skel.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="../assets/js/main.js"></script>
        <script src="../js/game.js"></script>
        <script src="../js/ajax.js"></script>
        <script src="../js/app.js"></script>
    </body>
</html>
