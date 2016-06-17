<?php

class ManageLevel {
    private $bd = null;
    private $tabla = "niveles";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden,aceptado, categoria";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "aceptado, categoria";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $nivel = new Level();
             $nivel->set($fila);
             $r[]=$nivel;
         }
         return $r;
    }
    
    function getListNoAccepted($pagina=1, $orden="", $nrpp=1){
        $ordenPredeterminado = "$orden,aceptado, categoria";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "aceptado, categoria";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "aceptado=0", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $nivel = new Level();
             $nivel->set($fila);
             $r[]=$nivel;
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
    
    /*function getLastLevel(){
        $this->bd->select($this->tabla, "MAX(nivel)");
        $fila=$this->bd->getRow();
        $nivel = new Level();
        $nivel->set($fila);
        return $nivel; 
    }*/
    
    function getLastLevel(){
        /*$sql = "select $proyeccion from $tabla " .
                "where $condicion order by $orden $limit";*/
        $this->bd->select($this->tabla, "nivel");
        $fila=$this->bd->getRow();
        return $fila; 
    }
    
    /*function getLastLevel(){
        $this->bd->select($this->tabla, "MAX(nivel)");
        $fila=$this->bd->getRow();
        return $fila; 
    }*/
    
    //SELECT nivel FROM `niveles` order by nivel desc limit 1
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "id=:ID", $parametros);
        $fila=$this->bd->getRow();
        $nivel = new Level();
        $nivel->set($fila);
        return $nivel;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['id'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Level $nivel){
        return $this->delete($nivel);
    }
    
    function set(Level $nivel, $pkCode){
        $parametros = $nivel->getArray();
        $parametrosWhere = array();
        $parametrosWhere["id"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
   
    public function insert(Level $nivel){
        $parametros = $nivel->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "id", array(), "id");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
        
    function count($condicion="aceptado = 0", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
}
