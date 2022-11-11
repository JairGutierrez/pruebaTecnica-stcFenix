<?php

class Persona {
    protected $id;
    protected $nombre;
    protected $correo;
    protected $password;
    protected $direccion;
    protected $cedula;
    protected $foto;

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function getFoto(){
        return $this->foto;
    }


    function Persona($id="" , $nombre="", $correo="", $password="", $direccion="", $cedula="", $foto=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> password = $password;
        $this -> direccion = $direccion;
        $this -> cedula = $cedula;
        $this -> foto = $foto;
    }
}
?>