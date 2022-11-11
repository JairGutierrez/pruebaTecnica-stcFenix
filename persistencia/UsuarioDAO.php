<?php

class UsuarioDAO {

    private $id;
    private $nombre;
    private $correo;
    private $password;
    private $cargo;
    private $edad;
    private $direccion;
    private $cedula;
    private $foto;

    function UsuarioDAO($id= "", $nombre= "", $correo= "", $password= "", $cargo= "", 
                        $edad= "", $direccion= "", $cedula= "", $foto= ""){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->password = $password;
        $this->cargo = $cargo;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->cedula = $cedula;
        $this->foto = $foto;
    }

    function registrar(){
        return  "insert into usuario (nombre, correo, password, cargo, edad, direccion, cedula)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', 
                        '" . md5($this->password) . "', '" . $this -> cargo . "',
                        '" . $this -> edad . "', '" . $this -> direccion ."',
                        '" . $this -> cedula . "')";
    }
   

    function autenticar(){
        return "select idusuario
                from usuario 
                where correo = '" . $this -> correo . "' and password = '" . md5($this-> password) . "'";
    }
   
    function actualizar(){
        return "update usuario set 
                nombre = '" . $this -> nombre . "',
                cargo='" . $this -> cargo . "',
                edad='" . $this -> edad . "',
                direccion='" . $this -> direccion . "',
                cedula='" . $this -> cedula . "'
                where idusuario=" . $this -> id;
    }
    
    function actualizarFoto(){
        return "update usuario set
                foto = '" . $this -> foto . "'
                where idusuario=" . $this -> id;
    }
    
    function consultar() {
        return "select nombre, correo, cargo, edad, direccion, cedula, foto
                from usuario
                where idusuario =" . $this -> id;
    }

    function consultarAA() {
        return "select nombre, cargo, edad, direccion, cedula, foto
                from usuario
                where idusuario =" . $this -> id;
    }

    function crear() {
        return  "insert into usuario (nombre, apellido, correo, password, codigoEstudiantil, 
                                        direccion, telefono, numeroID, idProyecto, idTipoIdentificacion, idGenero)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . md5($this -> password) . "','".$this -> codigoEstudiantil . "', 
                        '".$this -> direccion . "', '".$this -> telefono . "', '".$this -> numeroID . "','".$this -> idProyecto . "', '" .$this -> idTipoIdentificacion ."', '" .$this -> idGenero ."')";
    }
        
    function existeCorreo(){
        return "select idusuario 
                from usuario
                where correo = '" . $this->correo . "'";
    }

    function consultarTodos(){	
        return "select  idusuario, nombre, correo, cargo, edad, direccion, cedula, foto
                from usuario
                order by nombre";
                       
                
    }

    function eliminarUsuario(){
        return "delete from usuario 
                where idusuario =" . $this -> id;
    }
    
    
}


        
?>