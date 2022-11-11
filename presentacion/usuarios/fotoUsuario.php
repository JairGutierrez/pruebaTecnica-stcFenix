<?php
$exito = "";
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$usuario = new Usuario($_GET["idusuario"]);
$usuario->consultar();
if (isset($_POST["actualizar"])) {
    // recibimos los datos de la imagen
    $nombre_foto = $_FILES['foto']['name'];
    $tipo_foto = $_FILES['foto']['type'];
    $tam_foto = $_FILES['foto']['size'];
    if ($tam_foto <= 300000) {
        if (strlen($nombre_foto) <= 45) {
            if ($tipo_foto == "image/png" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/jpg") {
                if ($usuario->getFoto()) {
                    unlink("C:/xampp/htdocs/pruebaT/imgFotosUsers/" . $usuario->getFoto());
                }
                // ruta de la carpeta destino en el servidor
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pruebaT/imgFotosUsers/';
                // movemos la imagen de la carpeta temporal al directorio escogido
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_foto);

                $usuario = new Usuario($_GET["idusuario"], "", "", "", "", "", "", "", $nombre_foto); // Crear el atributo foto en usuario
                $usuario->actualizarFoto();
            } else {
                $exito = "El tipo de la foto solo puede ser png,jpeg y jpg";
            }
        } else {
            $exito = "El nombre de de la
						foto es muy largo.";
        }
    } else {
        $exito = "El tamano de la
						foto es muy grande.";
    }
}
include 'presentacion/barraLateral.php';
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
<div class="cardFotoActualizar">
        <h1 class="tituloUsuario mt-5">Actualizar Foto Usuario</h1>
        <div class="cardFotoActualizar-cFA">
            <div class="cardFotoActualizar-cFA-info">
                <section class="cardFotoActualizar-cFA-info-arriba mt-1">
                    <img class="cardFotoActualizar-cFA-info-arriba-foto" src="/pruebaT/imgFotosUsers/<?php echo $usuario->getFoto()?>" alt="...">
                </section>
                <section class="cardFotoActualizar-cFA-info-abajo">
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/usuarios/fotoUsuario.php") ."&idusuario=".$_GET["idusuario"] ?> method="post" enctype="multipart/form-data">
                        <section class="cardFotoActualizar-cFA-info-abajo-formArriba mt-1">
                            <div class="form-group">
                                <input type="file" name="foto" size="30" class="form-control" placeholder="Foto" required="required">
                            </div>
                        </section>
                        <section class="cardFotoActualizar-cFA-info-abajo-formAbajo">
                            <section class="cardFotoActualizar-cFA-info-abajo-formAbajo-izq">
                                <button class="cardFotoActualizar-cFA-info-abajo-formAbajo-izq-btn" type="submit" name="actualizar">Actualizar</button>
                            </section>
                            <section class="cardFotoActualizar-cFA-info-abajo-formAbajo-der">
                                <?php if (isset($_POST["actualizar"])) { ?>
                                        <?php if($exito!="") { ?>
                                            <div class="alert alert-danger cardFotoActualizar-cFA-info-abajo-formAbajo-der" role="alert"><?php echo $exito ?></div>
                                        <?php }else{?>
                                            <div class="alert alert-success cardFotoActualizar-cFA-info-abajo-formAbajo-der-alertaFo" role="alert">foto actualizada</div>
                                        <?php }?>
                                <?php } ?>
                            </section>
                        </section>
                    </form>
                </section>
            </div>
        </div>
        <div class="cardFotoActualizar-botonInfo mt-2">
            <div class="cardFotoActualizar-botonInfo-bCI">
                <div class="cardFotoActualizar-botonInfo-bCI-botones">
                    <a class="cardFotoActualizar-botonInfo-bCI-botones-linkCard"   
                        href="index.php?pid=<?php echo base64_encode("presentacion/usuarios/listadoUsuarios.php") ?>">
                        Volver</a>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>