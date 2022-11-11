<?php
require 'persistencia/EmpresaDAO.php';
require_once 'persistencia/Conexion.php';

class Empresa{
    private $idempresas;
    private $nombre;
    private $descripcion;
    private $foto;
    private $razonSocial;
    private $anioCreacion;
    private $ubicacion;
    private $empresaDAO;
    private $conexion;

    

    public function getIdempresas(){
        return $this->idempresas;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function getRazonSocial(){
        return $this->razonSocial;
    }

    public function getAnioCreacion(){
        return $this->anioCreacion;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function getEmpresaDAO(){
        return $this->empresaDAO;
    }

    public function getConexion(){
        return $this->conexion;
    }
    
	
    function Empresa ($idempresas="", $nombre="", $descripcion="", $foto="", $razonSocial="", $anioCreacion="", $ubicacion=""){ 
        $this -> idempresas = $idempresas;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> foto = $foto;
        $this -> razonSocial = $razonSocial;
        $this -> anioCreacion = $anioCreacion;
        $this -> ubicacion = $ubicacion;
        $this -> conexion = new Conexion();
        $this -> empresaDAO = new EmpresaDAO($idempresas, $nombre, $descripcion, $foto, $razonSocial, $anioCreacion, $ubicacion);        
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO -> registrar());
        $this -> conexion -> cerrar();
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO ->actualizarFoto());
        $this -> conexion -> cerrar();
    }
    
    function existeEmpresa(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO -> existeEmpresa());
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
        $this -> conexion -> ejecutar($this -> empresaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> descripcion = $resultado[1];
        $this -> razonSocial = $resultado[2];
        $this -> anioCreacion = $resultado[3];
        $this -> ubicacion = $resultado[4];
        $this -> conexion -> cerrar();
    }

    function consultarAA(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> codigoEstudiantil = $resultado[3];
        $this -> direccion = $resultado[4];
        $this -> telefono = $resultado[5];
        $this -> foto = $resultado[6];
        $this -> numeroID = $resultado[7];
        $this -> idProyecto = $resultado[8];
        $this -> idTipoIdentificacion = $resultado[9];
        $this -> idGenero = $resultado[10];
        $this -> conexion -> cerrar();
    }

    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Empresa($registro[0], $registro[1], $registro[2], "", $registro[3], $registro[4], $registro[5]);
            $i++;
        }        
        $this -> conexion -> cerrar();
        return $resultados;  
    }

    function eliminarEmpresa(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> empresaDAO -> eliminarEmpresa());
        $this -> conexion -> cerrar(); 
    }
    
}