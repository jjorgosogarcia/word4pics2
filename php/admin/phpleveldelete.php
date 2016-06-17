<?php
require '../../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageLevel($bd);
$code = Request::get("Code");
$f = Request::get("f");
$nivel = Request::get("nivel");

if($f===null){
    $r = $gestor->delete($code); 
}else{
    $r = $gestor->forzarDelete($code);
}
Utilidades::removeDirectory("../../juego/fotos/$nivel");

$bd->close();
header("Location:../../admin/niveles.php?op=eliminado&r=$r");