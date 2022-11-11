<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$empresa = new Empresa();
$empresas = $empresa->consultarTodos();
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
    <h1 class="titulos">Listado de Empresas</h1>
    <div>
        <table class="table containerLE-tablaLE table-striped table-hover">
            <thead class="containerLE-tablaLE-tHeadLE">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Razón Social</th>
                    <th scope="col">Año de Creación</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Servicios</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($empresas as $e) {
                        echo "<tr>";
                        echo "<td>" . $e->getIdempresas() . "</td>";
                        echo "<td>" . $e->getNombre() . "</td>";
                        echo "<td>" . $e->getDescripcion() . "</td>";
                        echo "<td>" . $e->getRazonSocial() . "</td>";
                        echo "<td>" . $e->getAnioCreacion() . "</td>";
                        echo "<td>" . $e->getUbicacion() . "</td>";
                        echo "<td>" . "<a class='fas fa-eye' href='index.php?pid=" . base64_encode("presentacion/empresas/verDetallesEmpresas.php") . "&idempresas=" . $e->getIdempresas() . "' data-toggle='tooltip' data-placement='left' title='Ver Detalles'> </a>
                                        <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/empresas/actualizarEmpresas.php") . "&idempresas=" . $e->getIdempresas() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                        <a class='fas fa-trash' href='index.php?pid=" . base64_encode("presentacion/empresas/eliminarEmpresa.php") . "&idempresas=" . $e->getIdempresas() . "' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            </td>";
                        echo "</tr>";
                    }
                    echo "<tr><td colspan='9'>" . count($empresas) . " registros encontrados</td></tr>"
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


