<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");
/*Nivel*/
$bd = new DataBase();

$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);

//$perfil->setAvatar(Request::post("avatar"));
$perfil->setNombre(Request::post("nombre"));
$perfil->setApellidos(Request::post("apellidos"));
$perfil->setCiudad(Request::post("ciudad"));

/*Subir fotografia*/

if(is_null(Request::post("nuevaImagen"))){
    echo 'No hay datos';
    $subir = new FileUpload("nuevaImagen");
    $subir->setDestino("../avatares/");
    $subir->setNombre($idUsuario);
    $subir->setPolitica(FileUpload::REEMPLAZAR);
    $perfil->setAvatar($idUsuario.".".$subir->getExtension());
    
    if($subir->upload()){
        echo 'Archivo subido con éxito';
    } else{
        echo 'Archivo no subido';
    }
}else{
    echo "Si hay datos";
    $subir = new FileUpload("nuevaImagen");
    $subir->setDestino("../avatares");
    $subir->setNombre($idUsuario);
    $subir->setPolitica(FileUpload::REEMPLAZAR);
    $perfil->setAvatar($idUsuario.".".$subir->getExtension());
    
    if($subir->upload()){
        echo 'Archivo subido con éxito';
    } else{
        echo 'Archivo no subido';
    }
}

$r = $gestorPerfil->set($perfil, $idUsuario);
header("Location:../usuario/editprofile.php");

$bd->close();
echo $r;
