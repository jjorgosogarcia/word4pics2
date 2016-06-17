<!DOCTYPE HTML>

<html>
    <head>
           <?php include './header.php';?></div>
    </head>
    <body class="index">
        <div id="page-wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <nav id="nav">
                    <ul>
                        <li class="current"><a href="#">Home</a></li>
                        <li><a href="login/login.php">Login</a></li>
                        <li><a href="registro.php" class="button special">Registro</a></li>
                    </ul>
                </nav>
            </header>

            <!-- Banner -->
            <section id="banner">

                <!--
                        ".inner" is set up as an inline-block so it automatically expands
                        in both directions to fit whatever's inside it. This means it won't
                        automatically wrap lines, so be sure to use line breaks where
                        appropriate (<br />).
                -->
                <div class="inner">

                    <header>
                        <h2>Word4Pics</h2>
                    </header>
                    <p>Con sólo <strong>4</strong> imágenes, 
                        <br />
                        se abre un mundo
                        <br />
                        de posibilidades.</p>
                    <footer>
                        <ul class="buttons vertical">
                            <li><a href="#main" class="button fit scrolly">Conócenos</a></li>
                        </ul>
                    </footer>

                </div>

            </section>

            <!-- Main -->
            <article id="main">

                <header class="special container">
                    <span class="icon fa fa-gamepad"></span>
                    <h2>Bienvenid@ a <strong>Word4Pics</strong>
                        <br />
                        El lugar donde podrás divertirte en familia.</h2>
                    <p>Word4Pics es un juego en el cual tendrás que desarrollar tu capacidad de razonamiento. Tendrás que averiguar que palabra en comñun describe a las cuatro imágenes que se nos presenta. Para ello nos saldrán unas letras con las cuales podrémos interactuar, entre ellas se encuentran las letras que conforman la palabra, pero además aparecerán otras letras que no tendrán nada que ver, para dificultarnos un poco el nivel.
                        Además de los niveles que ya vienen creados, se ha creado un editor para que el usuaroi pueda crear los suyos propios y que los demás jugadores puedan adiviniar la palabra que ha creado dicho usuario. Para ello tiene que ser aceptado previamente por el administrador de la página para asegurarse de su correcto funcionamiento.

                </header>


                <!-- Two -->
                <section class="wrapper style1 container special">
                    <div class="row">
                        <div class="6u 12u(narrower)">

                            <section>
                                <img src="imagenes/iconos/help.png"/>
                                <header>
                                    <h3>Dar pista</h3>
                                </header>
                                <p>Al pulsar sobre esta ayuda, automáticamente se colocará una letra en su sitio correspondiente, facilitandonos así el poder acertar el resto de las letras al tener una parte de la palabra rellena.</p>
                            </section>

                        </div>
                        <div class="6u 12u(narrower)">

                            <section>
                                <img src="imagenes/iconos/deleteword.png"/>
                                <header>
                                    <h3>Borrar letra</h3>
                                </header>
                                <p>Al pulsar sobre esta ayuda, se eliminará una de las letras aparecidas para confundirnos, dejandonos así el campo mas limpio y descartando esa letra en cualquier hueco que estuvieramos pensando insertarlo.</p>
                            </section>

                        </div>

                    </div>
                </section>

            </article>

            <!-- CTA -->
            <section id="cta">

                <header>
                    <h2>¿Estás preparado para empezar a jugar?</h2>
                    <p>Únete a la comunidad de Word4Pics.</p>
                </header>
                <footer>
                    <ul class="buttons">
                        <li><a href="registro.php" class="button special">Registrate</a></li>
                        <li><a href="login/login.php" class="button">Inicia sesión</a></li>
                    </ul>
                </footer>

            </section>
        <!-- FOOTER -->
        <footer id="footerIndex" >
            <ul class="icons">
                <li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>   
                        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.scrollgress.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        </div>

    </body>
</html>
