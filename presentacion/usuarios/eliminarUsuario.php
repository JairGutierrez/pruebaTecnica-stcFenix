<?php

$usuario = new Usuario($_GET["idusuario"]);
$usuario->eliminarUsuario();

header("Location: index.php?pid=". base64_encode("presentacion/usuarios/listadoUsuarios.php"). "");
?>