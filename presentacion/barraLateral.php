<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssBarra/stylesBarra.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<div class="barraLateral">
    <ul class="ulLinks">
        <div class="barraLateral-sectionArriba">
            <li id="liLinks" class="nav-item">
                <a id="aLinks" class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdmin.php")?>">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a id="aLinks" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Empresas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/empresas/crearEmpresas.php")?>">Crear Empresas</a></li>
                    <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/empresas/listadoEmpresas.php")?>">Listado Empresas</a></li>
                </ul>
            </li><li class="nav-item dropdown">
                <a id="aLinks" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuarios/crearUsuarios.php")?>">Crear Usuarios</a></li>
                    <li><a class="dropdown-item"href="index.php?pid=<?php echo base64_encode("presentacion/usuarios/listadoUsuarios.php")?>">Listado Usuarios</a></li>
                </ul>
            </li>
        </div>
        <div class="barraLateral-sectionAbajo">
            <li id="liLinks" class="nav-item">
                <a id="aLinks" class="nav-link" href="index.php">Salir</a>
            </li>
        </div>
    </ul>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>