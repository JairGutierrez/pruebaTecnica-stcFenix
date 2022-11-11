<?php

class EmpresaDAO{
    private $idempresas;
    private $nombre;
    private $descripcion;
    private $foto;
    private $razonSocial;
    private $anioCreacion;
    private $ubicacion;
	
    function EmpresaDAO($idempresas="", $nombre="", $descripcion="", $foto="", $razonSocial="", 
                        $anioCreacion="", $ubicacion=""){ 
        $this -> idempresas = $idempresas;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> foto = $foto;
        $this -> razonSocial = $razonSocial;
        $this -> anioCreacion = $anioCreacion;
        $this -> ubicacion = $ubicacion;   
    }
    

    function registrar(){
        return  "insert into empresas (nombre, descripcion, razonSocial, anioCreacion, ubicacion)
                values ('" . $this->nombre . "', '" . $this->descripcion . "', 
                        '" . $this->razonSocial . "', '" . $this->anioCreacion . "',
                        '" . $this->ubicacion . "')";
    }

    function actualizar(){
        return "update empresas set 
                nombre= '" . $this -> nombre . "',
                descripcion= '" . $this -> descripcion . "',
                razonSocial= '" . $this -> razonSocial . "',
                anioCreacion= '" . $this -> anioCreacion . "',
                ubicacion= '" . $this -> ubicacion . "'
                where idempresas=" . $this -> idempresas;
    }
    
    function actualizarFoto(){
        return "update empresas set
                foto = '" . $this -> foto . "'
                where idempresas=" . $this -> idempresas;
    }
    
    function existeEmpresa(){
        return "select idempresas 
                from empresas
                where nombre = '" . $this->nombre . "'";
    }

    
    function consultar() {
        return "select nombre, descripcion, razonSocial, anioCreacion, ubicacion
                from empresas
                where idempresas =" . $this -> idempresas;
    }

    function consultarAA() {
        return "select nombre, apellido, correo, codigoEstudiantil, direccion, telefono, foto, numeroID, idProyecto, idTipoIdentificacion, idGenero
                from empresas
                where idempresas =" . $this -> idempresas;
    }

    function crear() {
        return  "insert into empresas (nombre, apellido, correo, password, codigoEstudiantil, 
                                        direccion, telefono, numeroID, idProyecto, idTipoIdentificacion, idGenero)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . md5($this -> password) . "','".$this -> codigoEstudiantil . "', 
                        '".$this -> direccion . "', '".$this -> telefono . "', '".$this -> numeroID . "','".$this -> idProyecto . "', '" .$this -> idTipoIdentificacion ."', '" .$this -> idGenero ."')";
    }
    
    function consultarTodos(){	
        return "select idempresas, nombre, descripcion, razonSocial, anioCreacion, ubicacion
                from empresas
                order by nombre";       
    }

    function eliminarEmpresa(){
        return "delete from empresa 
                where idempresas =" . $this -> idempresas;
    }

   
    
    
}