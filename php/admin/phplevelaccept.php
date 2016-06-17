<?php
require '../../clases/AutoCarga.php';

$bd = new DataBase();
$gestor = new ManageLevel($bd);
$code = Request::get("Code");
$nivel = $gestor->get($code);

$nuevoNivel = new Level();
$nuevoNivel->read();

$nuevoNivel->setId($nivel->getId());
$nuevoNivel->setNivel($nivel->getNivel());
$nuevoNivel->setCategoria($nivel->getCategoria());
$nuevoNivel->setSolucion($nivel->getSolucion());
$nuevoNivel->setImagen1($nivel->getImagen1());
$nuevoNivel->setImagen2($nivel->getImagen2());
$nuevoNivel->setImagen3($nivel->getImagen3());
$nuevoNivel->setImagen4($nivel->getImagen4());
$nuevoNivel->setUsuario($nivel->getUsuario());
$nuevoNivel->setAceptado('1');

$r = $gestor->set($nuevoNivel, $code);
header("Location:../../admin/niveles.php");


$bd->close();
echo $r;