<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$empresa = new Empresa($_GET["idempresas"]);
$empresa->consultar();

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

<div class="containerVD">
    <h1 class="titulos">Detalles Empresa</h1>
    <div class="containerVD-cardPC">
        <section class="containerVD-cardPC-infoPC">
            <section class="containerVD-cardPC-infoPC-sectionIzq">
                <section class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo">
                    <h5 class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo-nameUser">
                        <?php echo $empresa -> getNombre() ?>
                    </h5>
                    <div class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo-infoUser">
                        <div>
                            <?php echo "Descripción: ". $empresa -> getDescripcion() ?> 
                        </div> 
                        <div>
                            <?php echo "Razón social: ". $empresa -> getRazonSocial() ?> 
                        </div>
                        <div>
                            <?php echo "Año de creación: ". $empresa -> getAnioCreacion() ?>
                        </div>
                        <div>
                            <?php echo "Ubicación: ". $empresa -> getUbicacion() ?>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <div class="containerVD-cardPC-abajoVolver">
                <div class="containerVD-cardPC-abajoVolver-botones mt-5">
                    <a class="containerVD-cardPC-abajoVolver-botones-linkCard" href="index.php?pid=<?php echo base64_encode("presentacion/empresas/listadoEmpresas.php")  ?>">Volver</a>
                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>