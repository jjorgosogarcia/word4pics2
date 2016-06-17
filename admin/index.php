<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorPerfil = new ManageProfile($bd);
$op = Request::get("op");
$r = Request::get("r");
$page = Request::get("page");
if($page===null || $page ===""){
    $page = 1;
}
/*Nos devuelve el numero de paginas*/
$registros = $gestorPerfil->count();
$pages = ceil($registros/  Constant::NRPP);
/**/
$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";
$trozoEnlace ="";
if(trim($orden)!=""){
    $trozoEnlace = "&order=$order&sort=$sort";
}
$perfil = $gestorPerfil->getList($page, trim($orden));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Index Admin</h1>
        <div class="contenedor"> 
        <h2><?php
            if ($op != null) {
                echo "<h1>El usuario se ha $op </h1>";
            }
            ?>
        </h2>
        <h2><a href="viewinsertadmin.php">Insertar Usuario</a></h2>
        <div class="CSSTableGenerator" >
            <table border="1">
                <thead>
                    <tr class="CSSTableGenerator2">
                        <th>
                            Correo
                            <a href="?order=correo&sort=desc">&Del;</a> 
                            <a href="?order=correo&sort=asc">&Delta;</a></th>
                        </th>
                        <th>
                            Nick
                             <a href="?order=rol&sort=desc">&Del;</a> 
                            <a href="?order=rol&sort=asc">&Delta;</a></th>
                        </th>
                        
                        <th>
                            Nombre
                             <a href="?order=fecharegistro&sort=desc">&Del;</a> 
                            <a href="?order=fecharegistro&sort=asc">&Delta;</a></th>
                        </th>
                        
                        <th>
                            Fecha de nacimiento
                             <a href="?order=activo&sort=desc">&Del;</a> 
                            <a href="?order=activo&sort=asc">&Delta;</a></th>
                        </th>
                        
                        <th>
                            Ciudad
                             <a href="?order=nickname&sort=desc">&Del;</a> 
                            <a href="?order=nickname&sort=asc">&Delta;</a></th>
                        </th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="CSSTableGenerator2">
                        <td colspan="11">
                            <a href="?page=1<?php $trozoEnlace ?>">Primero</a>
                            <a href="?page=<?php echo max(1, $page - 1) . $trozoEnlace ?>">Anterior</a>
                            <a href="?page=<?php echo min($page + 1, $pages) . $trozoEnlace ?>">Siguiente</a>
                            <a href="?page=<?php echo $pages . $trozoEnlace ?>">Ultimo</a>
                            <form method="post" style="display: inline;" id="fselect" action=".">
                            </form>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                         <?php foreach ($perfil as $indice => $pf) { ?>
                        <tr>
                            <td><?= $pf->getCorreo() ?></td>
                            <td><?= $pf->getNickname()?> </td>
                            <td><?= $pf->getNombre() .' '. $pf->getApellidos() ?></td>
                            <td><?= $pf->getFnac() ?></td>
                            <td><?= $pf->getCiudad()?></td>
                            <td>
                                <a class='borrar' href='../php/admin/phpuserdelete.php?Code=<?= $pf->getCorreo() ?>'>borrar</a> 
                                <a href='./vieweditadmin.php?ID=<?= $pf->getCorreo() ?>'>editar</a>
                            </td>
                        </tr>
                   <?php } ?>
                </tbody>
            </table>
            </div>
            <div class="logout"><a class="enlace" href="../login/phplogout.php">Logout</a></div>
            </div>
    </body>
</html>
<?php
$bd->close();
