<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageProfile($bd);
$id = Request::get("ID");
$usuarios = $gestor->get($id);
/*$sesion = new Session();
$usuario = $sesion->get("email");
$usuarioAdmin = $gestor->get($usuario);*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <form action="../php/admin/phpedit.php" method="POST">
           <input type="hidden" name="email" value="<?php echo $usuarios->getCorreo()?>" /><br />
           <span class="labels">Email<sup>*</sup></span><input type="text" name="email" value="<?php echo $usuarios->getCorreo();?>"/><br />
            
            <label for="nombre">Nombre: </label><input type="text" name="nombre" value="<?php echo $usuarios->getNombre()?>" /><br/>
            <label for="apellidos">Apellidos: </label><input type="text" name="apellidos" value="<?php echo $usuarios->getApellidos()?>" /><br/>  
            <label for="ciudad">Ciudad: </label><input type="text" name="ciudad" value="<?php echo $usuarios->getCiudad()?>" /><br/> 
            
            <input type="hidden" name="imagen" value="<?php echo $usuarios->getAvatar();?>" /><br />

            <input type="hidden" name="pkID" value="<?php echo $usuarios->getCorreo();?>" /><br/>
            <input class="botonEditar" type="submit" value="editar"/>
            <a href="index.php"><button type="button">Atras</button></a>
        </form>
    </body>
</html>
<?php
$bd->close();
