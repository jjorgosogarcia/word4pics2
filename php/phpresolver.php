<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$sesion = new Session();
$idUsuario = $sesion->get("_usuario");

$gestorPerfil = new ManageProfile($bd);
$perfil = $gestorPerfil->get($idUsuario);
$nivelActual = $perfil->getNivel();

$gestor = new ManageLevel($bd);
$nivel = $gestor->get($nivelActual);

$palabra = strtoupper($nivel->getSolucion());
$numero = strlen($palabra);

$arrayLetras = Array();

    for ($i = 0; $i <= $numero; $i++) {
       array_push($arrayLetras, Request::post("caja$i"));
    }
    
    $respuestaUsuario = implode($arrayLetras);
    
    if(strtoupper($respuestaUsuario) == $palabra){
        echo "Correcto";
        $perfil->setNivel($nivelActual + 1);
        $perfil->setPuntuacion($perfil->getPuntuacion()+100);
        $r = $gestorPerfil->set($perfil, $idUsuario);
        header("Location:../juego/index.php#juego");
    }else{
        echo $respuestaUsuario;
        echo $palabra;
        echo "No Correcto";
        header("Location:../juego/index.php?op=fallo");
    }

