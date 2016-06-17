<?php

class Profile {

    private $correo, $nickname, $nombre, $apellidos, $ciudad, $monedas,
            $monedasgastadas, $puntuacion, $nivel, $pistascompradas, $avatar;

    function __construct($correo = null,$nickname = null, $nombre = null, $apellidos = null, $ciudad = null, $monedas = null, $monedasgastadas = null, $puntuacion = null, $nivel = null, $pistascompradas = null, $avatar = null) {
        $this->correo = $correo;
        $this->nickname = $nickname;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->ciudad = $ciudad;
        $this->monedas = $monedas;
        $this->monedasgastadas = $monedasgastadas;
        $this->puntuacion = $puntuacion;
        $this->nivel = $nivel;
        $this->pistascompradas = $pistascompradas;
        $this->avatar = $avatar;
    }

    function getCorreo() {
        return $this->correo;
    }
        
    function getNickname() {
        return $this->nickname;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getMonedas() {
        return $this->monedas;
    }

    function getMonedasgastadas() {
        return $this->monedasgastadas;
    }

    function getPuntuacion() {
        return $this->puntuacion;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getPistascompradas() {
        return $this->pistascompradas;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setMonedas($monedas) {
        $this->monedas = $monedas;
    }

    function setMonedasgastadas($monedasgastadas) {
        $this->monedasgastadas = $monedasgastadas;
    }

    function setPuntuacion($puntuacion) {
        $this->puntuacion = $puntuacion;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setPistascompradas($pistascompradas) {
        $this->pistascompradas = $pistascompradas;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
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
