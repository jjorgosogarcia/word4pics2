<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
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
        <link href="../css/estilos.css" rel="stylesheet">
        <link href="../css/sweetalert2.min.css" rel="stylesheet">

    </head>
    <body class="index">
        <div id="page-wrapper">

            <header id="header" class="alt">
                <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
                <nav id="nav">
                    <ul>

                        <li><a href="../usuario/index.php">Perfil</a></li>
                        <li><a href="../juego/index.php" >Juego</a></li>
                        <li><a class="current">Subir nivel</a></li>
                        <li><a href="../php/phplogout.php">Logout</a></li>

                    </ul>
                </nav>
            </header>
            <?php
                if (Utilidades::isActivo($bd)) {
            ?>
            

            <div class="contenedorSubirFotos">
                             <?php if($op=="subido"){?> 
                <div><span class="enviado">Nivel enviado correctamente</span></div>
                <?php } ?>
                <div class="userProfile adv-round-rectangle subir">
                    <div id="vista-previa"></div>
                    <div id="respuesta"></div>
                    <form method="post" action="../php/phpsubir.php" id="formulario" enctype="multipart/form-data">
                        <span class="">Subir imagen:</span> <input type="file" id="file" name="file[]" multiple><br/>
                        <span class="">Categoria</span> <input type="text" name="categoria" id="categoria" value="" />
                        <span class="">Solución</span> <input type="text" name="solucion" id="solucion" value="" /><br/>
                        <input id="subirimagenes" type="submit" value="Subir imágenes" id="btn">
                    </form>

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

        <script src="../js/subirfotos.js"></script>
    </body>
</html>
