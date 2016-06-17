<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");
/*Nivel*/
$bd = new DataBase();
$gestor = new ManageLevel($bd);
$nivel = new Level();

$ultimoNivel = $gestor->count()+1;

/*Perfil*/
$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);
/*Usuario*/
$gestorUsuario = new ManageUser($bd);
$usuario = $gestorUsuario->get($idUsuario);
/*Pasamos los datos al nivel*/
$nivel->setCategoria(Request::post("categoria"));
$nivel->setSolucion(Utilidades::limpiaEspacios(Request::post("solucion")));
$nivel->setUsuario($perfil->getNickname());

if($usuario->getRol() == 'admin'){
    $nivel->setAceptado(1);
}else{
    $nivel->setAceptado(0);
}

$array = array();

echo "El ultimo nivel es: $ultimoNivel <hr>";

if (isset($_FILES["file"]))
{
   $reporte = null;
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
    $file = $_FILES["file"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../juego/fotos/$ultimoNivel/";
    
    if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
    }
    else if($size > 1024*1024)
    {
        $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
    }
    else if($width > 500 || $height > 500)
    {
        $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
    }
    else if($width < 60 || $height < 60)
    {
        $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
    }
    else
    {
        if(!file_exists("../juego/fotos/" . $ultimoNivel)){
            mkdir("../juego/fotos/" . $ultimoNivel);
        }
        
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);

        
        
        array_push($array, $nombre);
        echo 'El nombre es '.$nombre;
        var_dump($bd->getError());
        echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
    }
    }
    
        $nivel->setImagen1($array[0]);
        $nivel->setImagen2($array[1]);
        $nivel->setImagen3($array[2]);
        $nivel->setImagen4($array[3]);
        $nivel->setNivel($ultimoNivel);
        $r = $gestor->insert($nivel);
        header("Location:../nivel/index.php?op=subido");

        echo $r;

        echo $reporte;
}
