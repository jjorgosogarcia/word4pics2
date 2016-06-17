<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$login = Request::req("email");
$clave = sha1(Request::req("password"));
$usuarios = $gestor->get($login);
$sesion = new Session();
$privilegio = $usuarios->getRol();

if($usuarios->getCorreo()=== $login && $usuarios->getPassword() === $clave){
    if($usuarios->getRol()=='usuario'){
            echo "has entrado usuario";
            header("Location:../usuario/index.php");
    }
    if($usuarios->getRol()=='admin'){
            echo "has entrado admin";
            header("Location:../admin/niveles.php");
    }
    $sesion->set("_usuario", $login);
}else{
    echo "nopo";
    $sesion->destroy();
};
 