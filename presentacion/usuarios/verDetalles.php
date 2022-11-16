<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$usuario = new Usuario($_GET["idusuario"]);
$usuario->consultar();

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
    <h1 class="titulos">Detalles Usuarios</h1>
    <div class="containerVD-cardPC">
        <section class="containerVD-cardPC-infoPC">
            <section class="containerVD-cardPC-infoPC-sectionIzq">
                <section class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo">
                    <h5 class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo-nameUser">
                        <?php echo $usuario -> getNombre() ?>
                    </h5>
                    <div class="containerVD-cardPC-infoPC-sectionIzq-arribaInfo-infoUser">
                        <div>
                            <?php echo "Correo: ". $usuario -> getCorreo() ?> 
                        </div> 
                        <div>
                            <?php echo "Cargo: ". $usuario -> getCargo() ?> 
                        </div>
                        <div>
                            <?php echo "Edad: ". $usuario -> getEdad() ?>
                        </div>
                        <div>
                            <?php echo "Dirección: ". $usuario -> getDireccion() ?>
                        </div>
                        <div>
                            <?php echo "Número de identificación: ". $usuario -> getCedula() ?>
                        </div>
                    </div>
                </section>
            </section>
            <section class="containerVD-cardPC-infoPC-sectionDer">
                <section class="containerVD-cardPC-infoPC-sectionDer-fotoVer">
                    <img class="containerVD-cardPC-infoPC-sectionDer-fotoVer-fotoVerFoto" 
                            src="/pruebaT/pruebaTecnica-stcFenix/imgFotosUsers/<?php echo $usuario->getFoto()?>" height="200px"></img>
                </section>
            </section>
        </section>
        <div class="containerVD-cardPC-abajoVolver">
                <div class="containerVD-cardPC-abajoVolver-botones mt-5">
                    <a class="containerVD-cardPC-abajoVolver-botones-linkCard" href="index.php?pid=<?php echo base64_encode("presentacion/usuarios/listadoUsuarios.php")  ?>">Volver</a>
                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>