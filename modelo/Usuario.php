<?php
require 'persistencia/UsuarioDAO.php';
require_once 'persistencia/Conexion.php';

class Usuario extends Persona {
    private $cargo;
    private $edad;
    private $usuarioDAO;
    private $conexion;

    

    public function getCargo(){
        return $this->cargo;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getUsuarioDAO(){
        return $this->usuarioDAO;
    }

    public function getConexion(){
        return $this->conexion;
    }
    
	
    function Usuario ($id="", $nombre="", $correo="", $password="", $cargo="", 
                        $edad="", $direccion="", $cedula="", $foto="" ){ 
        $this -> Persona($id , $nombre,  $correo, $password, $direccion, $cedula, $foto);
        $this -> cargo = $cargo;
        $this -> edad = $edad;
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($id, $nombre, $correo, $password, $cargo, $edad, $direccion, $cedula, $foto);        
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> registrar());
        $this -> conexion -> cerrar();
    }

    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer(); 
            $this -> id = $registro[0];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO ->actualizarFoto());
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> correo = $resultado[1];
        $this -> cargo = $resultado[2];
        $this -> edad = $resultado[3];
        $this -> direccion = $resultado[4];
        $this -> cedula = $resultado[5];
        $this -> foto = $resultado[6];
        
        $this -> conexion -> cerrar();
    }

    function consultarAA(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarAA());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> cargo = $resultado[1];
        $this -> edad = $resultado[2];
        $this -> direccion = $resultado[3];
        $this -> cedula = $resultado[4];
        $this -> foto = $resultado[5];
        $this -> conexion -> cerrar();
    }

    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Usuario($registro[0], $registro[1], $registro[2], "", $registro[3], $registro[4], $registro[5], $registro[6], $registro[7]);
            $i++; 
        }        
        $this -> conexion -> cerrar();
        return $resultados;  
    }

    function eliminarUsuario(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> eliminarUsuario());
        $this -> conexion -> cerrar(); 
    }
    
}