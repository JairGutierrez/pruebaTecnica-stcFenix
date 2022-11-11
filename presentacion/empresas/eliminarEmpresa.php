<?php

$empresa = new Empresa($_GET["idempresas"]);
$empresa->eliminarEmpresa();

header("Location: index.php?pid=". base64_encode("presentacion/empresas/listadoEmpresas.php"). "");
?>