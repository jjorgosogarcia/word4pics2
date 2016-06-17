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
$puntuacion = $perfil->getPuntuacion();
//$numero = strlen($palabra);

//$letra = Utilidades::darLetras($solucion, $puntuacion);
   
$letra = Utilidades::generarLetrasInicio($solucion,$puntuacion);
//var_dump($letra);
echo '{"aparecerletras":"'.$letra.'"}';

$bd->close();
