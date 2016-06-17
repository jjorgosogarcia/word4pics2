<?php

class ManageProfile {
    private $bd = null;
    private $tabla = "perfil";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, fnac, ciudad";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "fnac, ciudad";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $profile = new Profile();
             $profile->set($fila);
             $r[]=$profile;
         }
         return $r;
    }
    
    function getListJson($pagina = 1, $orden = "", $nrpp = Constant::NRPP, $condicion = "1=1", $parametros = array()) {
        $list = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);
        $r = "[ ";
        foreach ($list as $objeto) {
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "correo=:ID", $parametros);
        $fila=$this->bd->getRow();
        $profile = new Profile();
        $profile->set($fila);
        return $profile;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['correo'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Profile $profile){
        return $this->delete($profile);
    }
    
    function set(Profile $profile, $pkCode){
        $parametros = $profile->getArray();
        $parametrosWhere = array();
        $parametrosWhere["correo"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
   
    public function insert(Profile $profile){
        $perfil = new Profile();
        $perfil = $profile;
        $perfil->setMonedas(0);
        $perfil->setMonedasgastadas(0);
        $perfil->setPuntuacion(1000);
        $perfil->setNivel(1);
        $perfil->setPistascompradas(0);
        $perfil->setAvatar("NULL");
        $parametros = $profile->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "correo", array(), "correo");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
        
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
}
