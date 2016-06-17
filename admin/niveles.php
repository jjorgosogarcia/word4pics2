<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorNivel = new ManageLevel($bd);
$contador = $gestorNivel->count();
$niveles = $gestorNivel->getListNoAccepted();
$gestor = new ManageUser($bd);

$sesion = new Session();
$idUsuario = $sesion->get("_usuario");

$usuario = $gestor->get($idUsuario);
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
                        <li><a class="current">Administrar</a></li>
                                                <li><a href="../nivel/index.php">Subir nivel</a></li>

                        <li><a class="button special" href="../php/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <div class="contenedor">
                <?php
                if ($usuario->getRol() == 'admin') {
                    if ($contador == 0) {
                        ?>
                        <span class="sinPermiso">No hay mas niveles que administrar</span>
                        <?php
                    }
                    ?>

                    <div id="background" class="polaroid">
                        <?php foreach ($niveles as $indice => $nivel) { ?>

                            <div class="divImagenes" id="gallery">
                                <figure class="pic1">
                                    <img class="imagenAvidivinar" src="../juego/fotos/<?= $nivel->getNivel() ?>/<?= $nivel->getImagen1() ?>"></img>
                                </figure>
                                <figure class="pic2">
                                    <img class="imagenAvidivinar" src="../juego/fotos/<?= $nivel->getNivel() ?>/<?= $nivel->getImagen2() ?>"></img>
                                </figure>
                                <figure class="pic3">
                                    <img class="imagenAvidivinar" src="../juego/fotos/<?= $nivel->getNivel() ?>/<?= $nivel->getImagen3() ?>"></img>
                                </figure>    
                                <figure class="pic4">
                                    <img class="imagenAvidivinar" src="../juego/fotos/<?= $nivel->getNivel() ?>/<?= $nivel->getImagen4() ?>"></img>
                                </figure>
                            </div>
                        </div>


                        <div class="cajaPistas">
                            <span class="etiqueta"><strong>Categoria:</strong> <?= $nivel->getCategoria() ?></span> 
                            <span class="etiqueta"><strong>Solucion:</strong> <?= $nivel->getSolucion() ?> </span>
                            <span class="etiqueta"><strong>Usuario:</strong> <?= $nivel->getUsuario() ?></span>
                        </div>
                        <div class="cajaPistas">
                            <a class='borrar' href='../php/admin/phplevelaccept.php?Code=<?= $nivel->getId() ?>'><img src="../imagenes/iconos/accept.png"/></a> 
                            <a class='borrar' href='../php/admin/phpleveldelete.php?Code=<?= $nivel->getId() ?>&nivel=<?= $nivel->getNivel() ?>'><img src="../imagenes/iconos/cancel.png"/></a>                 
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <span class="sinPermiso">Lo sentimos pero no tienes permisos para permanecer aquí</span>
                <?php } ?>
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
