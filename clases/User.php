<?php

class User {

    private $correo, $password, $rol, $fecharegistro, $activo;

    function __construct($correo = null, $password = null, $rol = null, 
            $fecharegistro = null, $activo = null) {
        $this->correo = $correo;
        $this->password = $password;
        $this->rol = $rol;
        $this->fecharegistro = $fecharegistro;  
        $this->activo = $activo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

    function getFecharegistro() {
        return $this->fecharegistro;
    }

    function getActivo() {
        return $this->activo;
    }
        
    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setFecharegistro($fecharegistro) {
        $this->fecharegistro = $fecharegistro;
    }
    
    function setActivo($activo) {
        $this->activo = $activo;
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
