<?php

class Utilidades {

    function removeDirectory($path) {
        $path = rtrim(strval($path), '/');
        $d = dir($path);
        if (!$d)
            return false;
        while (false !== ($current = $d->read())) {
            if ($current === '.' || $current === '..')
                continue;
            $file = $d->path . '/' . $current;
            if (is_dir($file))
                removeDirectory($file);
            if (is_file($file))
                unlink($file);
        }
        rmdir($d->path);
        $d->close();
        return true;
    }
    
   static public function isActivo($bd){
        require '../clases/ManageUser.php';
        $gestor = new ManageUser($bd);
        $sesion = new Session();
        $idUsuario = $sesion->get("_usuario");
        $usuarios = $gestor->get($idUsuario);
        
        if($usuarios->getActivo()==0){
            return false;
        }else{
            return true;
        }
    }
    
    function generarLetrasInicio($solucion){  
        $aLetras = Array('A', 'B', 'C','D', 'E', 'F','G', 'H', 'I','J', 'K', 'L','M', 'N', 
                                'O','P', 'Q', 'R','S', 'T', 'U','V', 'W', 'X','Y', 'Z');
        $valoresR = Array();
        //convertimos en array
        $sol = strtoupper($solucion);
        $array = str_split($sol);
        
        $resultado2 = Utilidades::generarLetrasFalsas($array,$aLetras);
        
        //Coge 4 valores random
        $valorRandom = array_rand($resultado2, 4);
        //Agrega el valor de los elementos al array
        for($i=0; $i<4; $i++){
            array_push($valoresR,$resultado2[$valorRandom[$i]]);
        }
        $palabrasAparecen = array_merge($array,$valoresR);
        shuffle($palabrasAparecen);
        return implode($palabrasAparecen);
    }
    
        function generarLetrasFalsas($array1, $array2){
        //sumamos ambos arrays
        $resultado = array_merge($array1, $array2);

        //quitamos los valores repetidos
        $resultado2 = array_unique($resultado);

        //quitamos del array las primeras posiciones hasta el numero indicado
        for($i=0; $i<count(array_unique($array1)); $i++){
            array_shift($resultado2);
        } 
        
        return $resultado2;
    }
    
    //Funcion para dar una letra que contenga la palabra
    function darLetras($solucion){    
           $azar = rand(0,strlen($solucion)-1);
           $dLetra = $solucion[$azar];
           $posicionLetra = $azar.strtoupper($dLetra);
           return $posicionLetra;
    }
    
    
    
    function borrarLetras($solucion, $todo){
        $array = str_split(strtoupper($solucion)); 
        $resultado2 = Utilidades::generarLetrasFalsas($array,$todo);
        $valorRandom = array_rand($resultado2, 1);
        $letraAzar = $resultado2[$valorRandom];
        return strtoupper($letraAzar);  
    } 

    static function limpiaEspacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
    }

}
