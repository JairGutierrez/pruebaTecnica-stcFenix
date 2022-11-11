<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$usuario = new Usuario();
$usuarios = $usuario->consultarTodos();
include "presentacion/barraLateral.php";
?>

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
      
<div class="containerLE">
    <h1 class="titulos">Listado de Usuarios</h1>
    <div>
        <table class="table containerLE-tablaLE table-striped table-hover">
            <thead class="containerLE-tablaLE-tHeadLE">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Servicios</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($usuarios as $u) {
                        echo "<tr>";
                        echo "<td>" . $u->getId() . "</td>";
                        echo "<td>" . $u->getNombre() . "</td>";
                        echo "<td>" . $u->getCorreo() . "</td>";
                        echo "<td>" . $u->getCargo() . "</td>";
                        echo "<td>" . $u->getEdad() . "</td>";
                        echo "<td>" . $u->getDireccion() . "</td>";
                        echo "<td>" . $u->getCedula() . "</td>";
                        echo "<td>" . (($u->getFoto()!="")?"<img src='/pruebaT/imgFotosUsers/" . $u->getFoto() . "' height='50px'>":"") . "</td>";
                        echo "<td>" . "<a class='fas fa-eye' href='index.php?pid=" . base64_encode("presentacion/usuarios/verDetalles.php") . "&idusuario=" . $u->getId() . "' data-toggle='tooltip' data-placement='left' title='Ver Detalles'> </a>
                                        <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/usuarios/actualizarUsuarios.php") . "&idusuario=" . $u->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                        <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/usuarios/fotoUsuario.php") . "&idusuario=" . $u->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                                        <a class='fas fa-trash' href='index.php?pid=" . base64_encode("presentacion/usuarios/eliminarUsuario.php") . "&idusuario=" . $u->getId()  . "' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            </td>";
                        echo "</tr>";
                    }
                    echo "<tr><td colspan='9'>" . count($usuarios) . " registros encontrados</td></tr>"
                ?>
            </tbody>
        </table>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>