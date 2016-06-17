<?php

require '../clases/AutoCarga.php';
header('Contet-Type: application/json');

$bd = new DataBase();
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");

$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);
$nivelActual = $perfil->getNivel();

$gestor = new ManageLevel($bd);
$nivel = $gestor->get($nivelActual);

$solucion = $nivel->getSolucion();

//$numero = strlen($palabra);
$perfil->setPistascompradas($perfil->getPistascompradas()+1);
$perfil->setPuntuacion($perfil->getPuntuacion()-50);
$r = $gestorPerfil->set($perfil, $idUsuario);
$letra = Utilidades::darLetras($solucion);
   
//var_dump($letra);
echo '{"darletra":"'.$letra.'"}';

$bd->close();
