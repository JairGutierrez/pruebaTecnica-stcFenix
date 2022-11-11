<?php 
class AdministadorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;
    
    function AdministadorDAO($id, $apellido, $nombre, $correo, $password){
        $this -> id = $id;
        $this -> apellido = $apellido;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> password = $password;
    }
    function autenticar(){
        return "select idadmin  
                from admin
                where correo = '" . $this-> correo . "' and password = md5('" . $this-> password ."')";

    }

    function existeCorreo(){
        return "select idadmin 
                from admin
                where correo = '" . $this->correo . "'";
    }

    function consultar(){
        return "select idadmin, nombre, apellido, correo 
                from admin
                where idadmin = '" . $this -> id . "'";
    }
}
?>