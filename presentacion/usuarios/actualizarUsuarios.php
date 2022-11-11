<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$usuario = new Usuario($_GET["idusuario"]);
$usuario->consultar();
if (isset($_POST["actualizar"]) ) {
    $nombre = $_POST["nombre"];
    $cargo = $_POST["cargo"];
    $edad = $_POST["edad"];
    $direccion = $_POST["direccion"];
    $cedula = $_POST["cedula"];
    $usuario = new Usuario($_GET["idusuario"], $nombre, "", "", $cargo, $edad, $direccion, $cedula, "");
    $usuario->actualizar();
}

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

<div class="containerCU"> 
    <h1 class="titulos">Actualizar Usuario</h1>
    <section class="containerCU-sectionArriba">
        <section class="containerCU-sectionArriba-formArriba">
            <form class="formlario" action=<?php echo "index.php?pid=" .base64_encode("presentacion/usuarios/actualizarUsuarios.php") ."&idusuario=".$_GET["idusuario"]?> method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el nombre" value="<?php echo $usuario->getNombre(); ?>" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">cedula</label>
                        <input type="number" name="cedula" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la cedula"  value="<?php echo $usuario->getCedula(); ?>"required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">cargo</label>
                        <input type="text" name="cargo" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el cargo" value="<?php echo $usuario->getCargo(); ?>"required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">edad</label>
                        <input type="number" name="edad" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la edad" value="<?php echo $usuario->getEdad(); ?>"required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">direccion</label>
                        <input type="text" name="direccion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la direccion" value="<?php echo $usuario->getDireccion(); ?>"required="">
                    </div>
                </div>
                <section class="containerCU-sectionArriba-formAbajo">
            <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear">
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert">
                        <?php if (isset($_POST["actualizar"])) { ?>
                        <div class="alert alert-success alert-dismissible fade show containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert-alerta"
                            role="alert">Usuario actualizado exitosamente.</div>
                        <?php } ?>
                    </div>
                </section>
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito">
                        <button class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito-botonCrearUsuario" type="submit" name="actualizar">actualizar</button>
                    </div>
                </section>
            </div>
        </section>
            </form>
        </section>
        
    </section>
    
    
    <div class="containerVD-cardPC-abajoVolver">
                <div class="containerVD-cardPC-abajoVolver-botones mt-3">
                    <a class="containerVD-cardPC-abajoVolver-botones-linkCard" href="index.php?pid=<?php echo base64_encode("presentacion/usuarios/listadoUsuarios.php")  ?>">Volver</a>
                </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>