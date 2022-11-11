<?php
$error = 0;
$correo = $_POST["correo"];
$password = $_POST["password"];
$usuario = new Usuario("", "", $correo, $password);
$administrador = new Administrador("", "", "", $correo, $password);
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();
    $_SESSION["rol"] = "administrador";
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdmin.php"));
}else if($usuario -> autenticar()){
    $_SESSION["id"] = $usuario -> getId();
    $_SESSION["rol"] = "usuario";
    header("Location: index.php?pid=" . base64_encode("presentacion/usuario/perfilUsuario.php"));
}else{
    header("Location: index.php?error=1");
}

?>