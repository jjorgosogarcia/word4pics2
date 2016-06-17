<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Word4Pics</title>
        <link rel="stylesheet" href="../css/font-awesome.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/estiloForm.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body class="index">
        <div id="page-wrapper">

            <header id="header" class="alt">
                <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li class="current"><a href="#">Login</a></li>
                        <li><a class="button special" href="../registro.php" >Registro</a></li>
                    </ul>
                </nav>
            </header>
            
            <article id="main">
            <h1 class="comunidad">Unete a la comunidad de Word4Pics</h1>

                <div class="container">
                    <section id="content">
                        <form action="../php/phplogin.php" method="post">
                            <h1>Login Form</h1>
                            <div class="formLogin">
                                <input type="text" placeholder="Email" required="" id="username" name="email" value="dragon_jonathan@msn.com"/>
                            </div>
                            <div class="formLogin">
                                <input type="password" placeholder="Password" required="" id="password" name="password" value="hola" />
                            </div>
                            <div class="formLogin">
                                <input type="submit" value="Log in" />
                            </div>
                        </form><!-- form -->
                    </section><!-- content -->
                </div><!-- container -->


            </article>

        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="../js/registro.js"></script>
        <?php include '../footer.php';?>
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
