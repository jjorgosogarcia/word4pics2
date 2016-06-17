<?php

require '../clases/AutoCarga.php';
header('Contet-Type: application/json');

$letras = Request::req("Letras");


$bd = new DataBase();
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");

$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);
$nivelActual = $perfil->getNivel();

$gestor = new ManageLevel($bd);
$nivel = $gestor->get($nivelActual);

$solucion = $nivel->getSolucion();
$perfil->setPistascompradas($perfil->getPistascompradas()+1);
$perfil->setPuntuacion($perfil->getPuntuacion()-50);
$r = $gestorPerfil->set($perfil, $idUsuario);

//$numero = strlen($palabra);

//$letra = Utilidades::darLetras($solucion, $puntuacion);
$arrayLetras = str_split($letras);

$letraEscogida = Utilidades::borrarLetras($solucion,$arrayLetras);
//var_dump($letra);
echo '{"borrarletra":"'.$letraEscogida.'"}';

$bd->close();


