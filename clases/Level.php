<?php

class Level {
    private $id, $nivel, $categoria, $solucion, $imagen1, $imagen2, $imagen3, $imagen4,
            $usuario, $aceptado;
    
    function __construct($id = null, $nivel = null, $categoria = 'otra', $solucion = null, $imagen1 = null, 
            $imagen2 = null, $imagen3 = null, $imagen4 = null, $usuario = 'administrador',
            $aceptado = 1) {
        $this->id = $id;
        $this->nivel = $nivel;
        $this->categoria = $categoria;
        $this->solucion = $solucion;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
        $this->imagen3 = $imagen3;
        $this->imagen4 = $imagen4;
        $this->usuario = $usuario;
        $this->aceptado = $aceptado;
    }
    
    function getId() {
        return $this->id;
    }

    function getNivel() {
        return $this->nivel;
    }
  
    function getCategoria() {
        return $this->categoria;
    }

    function getSolucion() {
        return $this->solucion;
    }

    function getImagen1() {
        return $this->imagen1;
    }

    function getImagen2() {
        return $this->imagen2;
    }

    function getImagen3() {
        return $this->imagen3;
    }

    function getImagen4() {
        return $this->imagen4;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getAceptado() {
        return $this->aceptado;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setSolucion($solucion) {
        $this->solucion = $solucion;
    }

    function setImagen1($imagen1) {
        $this->imagen1 = $imagen1;
    }

    function setImagen2($imagen2) {
        $this->imagen2 = $imagen2;
    }

    function setImagen3($imagen3) {
        $this->imagen3 = $imagen3;
    }

    function setImagen4($imagen4) {
        $this->imagen4 = $imagen4;
    }
    
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setAceptado($aceptado) {
        $this->aceptado = $aceptado;
    }

   function getJson() {
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' . $indice . '":"' . $valor . '",';
        }
        $r = substr($r, 0, -1);
        $r .= '}';
        return $r;
    }

    function set($valores, $inicio = 0) {
        $i = 0;
        foreach ($this as $indice => $valor) {
            $this->$indice = $valores[$i + $inicio];
            $i++;
        }
    }

    public function __toString() {
        $r = '';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }

    public function getArray($valores = true) {
        $array = array();
        foreach ($this as $key => $valor) {
            if ($valores === true) {
                $array[$key] = $valor;
            } else {
                $array[$key] = null;
            }
        }
        return $array;
    }

    function read() {
        foreach ($this as $key => $valor) {
            $this->$key = Request::req($key);
        }
    }

}
