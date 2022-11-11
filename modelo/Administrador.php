<?php
require_once  'persistencia/Conexion.php';
require 'persistencia/AdministradorDAO.php';

class Administrador extends Persona {
    private $apellido;
    private $administradorDAO;
    private $conexion;

    public function getApellido(){
        return $this->apellido;
    }
    
    function Administrador($id="", $nombre="", $apellido="", $correo="", $password=""){
        $this -> Persona($id , $nombre, $correo, $password);
        $this -> apellido = $apellido;
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministadorDAO($id, $nombre, $apellido, $correo, $password);
    }

    function autenticar(){
        $this -> conexion -> abrir();
       $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        if($this -> conexion ->numFilas()==1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0]; 
            $this -> conexion ->cerrar();
            return true;
        } else {
            $this -> conexion ->cerrar();
            return false;
        }
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;            
        }
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $resultado = $this -> conexion -> extraer();        
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> apellido = $resultado[2];
        $this -> correo = $resultado[3];
        $this -> conexion -> cerrar();
    }
}

?>