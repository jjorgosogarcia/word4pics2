<?php


class ManageUser {
    private $bd = null;
    private $tabla = "usuario";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, fecharegistro, rol";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "fecharegistro, rol";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $user = new User();
             $user->set($fila);
             $r[]=$user;
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
        $user = new User();
        $user->set($fila);
        return $user;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['correo'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(User $user){
        return $this->delete($user);
    }
    
    function set(User $user, $pkCode){
        $parametros = $user->getArray();
        $parametrosWhere = array();
        $parametrosWhere["correo"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
   
    public function insert(User $user){
        $usuario = new User();
        $usuario = $user;
        $usuario->setPassword(sha1($usuario->getPassword()));
        $usuario->setFecharegistro(date("y-m-d", time()));
        $usuario->setRol("usuario");
        $parametros = $user->getArray();
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
