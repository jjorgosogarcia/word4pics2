<?php

require '../clases/AutoCarga.php';

$bd = new DataBase();
$gestor = new ManageUser($bd);
$correo = Request::get("correo");
$usuarios = $gestor->get($correo);
$usuario = $gestor->get($correo);
$semilla = Request::get("activacion");
$activar = sha1(Constant::SEMILLA);


echo $correo;
       echo "<br><br> El mail es $correo y la semilla es $semilla y la activacion es $activar";

   if( $correo == $usuarios->getCorreo() && $activar == $semilla){
       echo 'El email esta registrado';
       echo "<br><br> El mail es $correo y la semilla es $semilla y la activacion es $activar";
       $usuario->setActivo(1);
       $r = $gestor->set($usuario, $correo);
       
   }else{
     /*  echo 'Este email no esta registrado';
       echo "<br><br> El mail es $correo y la semilla es $semilla y la activacion es $activar";*/
   }


header("Location:../usuario/confirmacion.php?op=activado");