<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");
/*Nivel*/
$bd = new DataBase();

$gestor= new ManageUser($bd);
$usuario = $gestor->get($idUsuario);

//$perfil->setAvatar(Request::post("avatar"));
$usuario->setActivo(0);

$r = $gestor->set($usuario, $idUsuario);
header("Location:../php/phplogout.php");


$bd->close();
echo $r;
var_dump($bd->getError());
