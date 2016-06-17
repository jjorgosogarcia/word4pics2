<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" href="docsupport/style.css">
            <link rel="stylesheet" href="assets/chosen/docsupport/prism.css">
            <link rel="stylesheet" href="assets/chosen/chosen.css">
        <link href="css/reset.css" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <?php include './header.php'; ?></div>

</head>
<body class="index">
    <div id="page-wrapper">

        <header id="header" class="alt">
            <h1 id="logo"><span class="color">Word</span><span class="numero">4</span><span class="color">Pics</span></h1>
            <nav id="nav">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="login/login.php">Login</a></li>
                    <li class="current"><a href="#" >Registro</a></li>

                </ul>
            </nav>
        </header>

        <article id="main">

            <h1 class="comunidad">Unete a la comunidad de Word4Pics</h1>
            <div class="form">
                <div id="signup">             
                    <form action="php/phpregistro.php" method="post">

                        <div class="top-row">
                            <div class="field-wrap">
                                <label class="labelregistro">
                                    Email<span class="req">*</span>
                                </label>
                                <input type="email" name="correo" required autocomplete="off" />
                            </div>
                            <div class="field-wrap">
                                <label class="labelregistro">
                                    Password<span class="req">*</span>
                                </label>
                                <input type="password" name="password" required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="top-row">
                            <div class="field-wrap">
                                <label class="labelregistro">
                                    Nombre<span class="req">*</span>
                                </label>
                                <input type="text" name="nombre" required autocomplete="off" />
                            </div>
                            <div class="field-wrap">
                                <label class="labelregistro">
                                    Apellidos<span class="req">*</span>
                                </label>
                                <input type="text" name="apellidos" required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="top-row">
                            <div class="field-wrap">
                                <label class="labelregistro">
                                    Nick<span class="req">*</span>
                                </label>
                                <input type="text" name="nick" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <select name="ciudad" data-placeholder="Choose a Country..." class="chosen-select" tabindex="2">
                                    <option value=""></option>
                                    <option value='A Coruña' >A Coruña</option>
                                    <option value='Álava'>álava</option>
                                    <option value='Albacete' >Albacete</option>
                                    <option value='Alicante'>Alicante</option>
                                    <option value='Almería' >Almería</option>
                                    <option value='Asturias' >Asturias</option>
                                    <option value='Ávila' >Ávila</option>
                                    <option value='Badajoz' >Badajoz</option>
                                    <option value='Barcelona'>Barcelona</option>
                                    <option value='Burgos' >Burgos</option>
                                    <option value='Cáceres' >Cáceres</option>
                                    <option value='Cádiz' >Cádiz</option>
                                    <option value='Cantabria' >Cantabria</option>
                                    <option value='Castellón' >Castellón</option>
                                    <option value='Ceuta' >Ceuta</option>
                                    <option value='Ciudad Real' >Ciudad Real</option>
                                    <option value='Córdoba' >Córdoba</option>
                                    <option value='Cuenca' >Cuenca</option>
                                    <option value='Gerona' >Gerona</option>
                                    <option value='Girona' >Girona</option>
                                    <option value='Las Palmas' >Las Palmas</option>
                                    <option value='Granada' >Granada</option>
                                    <option value='Guadalajara' >Guadalajara</option>
                                    <option value='Guipúzcoa' >Guipúzcoa</option>
                                    <option value='Huelva' >Huelva</option>
                                    <option value='Huesca' >Huesca</option>
                                    <option value='Jaén' >Jaén</option>
                                    <option value='La Rioja' >La Rioja</option>
                                    <option value='León' >León</option>
                                    <option value='Lleida' >Lleida</option>
                                    <option value='Lugo' >Lugo</option>
                                    <option value='Madrid' >Madrid</option>
                                    <option value='Malaga' >Málaga</option>
                                    <option value='Mallorca' >Mallorca</option>
                                    <option value='Melilla' >Melilla</option>
                                    <option value='Murcia' >Murcia</option>
                                    <option value='Navarra' >Navarra</option>
                                    <option value='Orense' >Orense</option>
                                    <option value='Palencia' >Palencia</option>
                                    <option value='Pontevedra'>Pontevedra</option>
                                    <option value='Salamanca'>Salamanca</option>
                                    <option value='Segovia' >Segovia</option>
                                    <option value='Sevilla' >Sevilla</option>
                                    <option value='Soria' >Soria</option>
                                    <option value='Tarragona' >Tarragona</option>
                                    <option value='Tenerife' >Tenerife</option>
                                    <option value='Teruel' >Teruel</option>
                                    <option value='Toledo' >Toledo</option>
                                    <option value='Valencia' >Valencia</option>
                                    <option value='Valladolid' >Valladolid</option>
                                    <option value='Vizcaya' >Vizcaya</option>
                                    <option value='Zamora' >Zamora</option>
                                    <option value='Zaragoza'>Zaragoza</option>
                                </select>

                            </div>
                        </div>

                        <button type="submit" class="button button-block"/>Registro</button>
                    </form>
                </div>
            </div> <!-- /form -->
        </article>
        <!-- Footer -->
        <?php include './footer.php'; ?></div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/registro.js"></script>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollgress.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script src="assets/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/chosen/config.js" type="text/javascript"></script>
</body>
</html>
