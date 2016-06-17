<?php

require '../clases/AutoCarga.php';

$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = new User();
$usuarios->read();
$gestorPerfil = new ManageProfile($bd);
$perfil = new Profile();
$perfil->read();

/*$enviarMail = new SendGoogleMail();
$titulo = 'Activacion de la cuenta';
$activacion = sha1($correo . Constant::SEMILLA);
$correo = Request::req("correo");
*/

echo "La ciudad es ".Request::post('ciudad')."<br>";

$usuarios->setActivo(0);
$usuarios->setRol("usuario");
$perfil->setNickname(Request::post('nick'));
$perfil->setNombre(Request::post('nombre'));
$perfil->setApellidos(Request::post('apellidos'));
$perfil->setCiudad(Request::post('ciudad'));
$r = $gestor->insert($usuarios);
$s = $gestorPerfil->insert($perfil);
$bd->close();

/* Mandamos un email al usuario para que active su cuenta */
//$enviarMail->sendActivationMail($correo, $titulo, "$titulo  http://jjorgoso.hol.es/word4pics/php/phpActivarCorreo.php?correo=$correo&activacion=$activacion");

//header("Location:../usuario/confirmacion.php?op=mail");

echo $r;
var_dump($bd->getError());