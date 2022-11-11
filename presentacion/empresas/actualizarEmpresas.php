<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$empresa = new Empresa($_GET["idempresas"]);
$empresa->consultar();
if (isset($_POST["actualizar"]) ) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $razonSocial = $_POST["razonSocial"];
    $anioCreacion = $_POST["anioCreacion"];
    $ubicacion = $_POST["ubicacion"];
    $empresa = new Empresa($_GET["idempresas"], $nombre, $descripcion, "", $razonSocial, $anioCreacion, $ubicacion);
    $empresa->actualizar();
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
    <h1 class="titulos">Actualizar Empresa</h1>
    <section class="containerCU-sectionArriba">
        <section class="containerCU-sectionArriba-formArriba">
            <form class="formlario" action=<?php echo "index.php?pid=" .base64_encode("presentacion/empresas/actualizarEmpresas.php") ."&idempresas=".$_GET["idempresas"]?> method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el nombre" value="<?php echo $empresa->getNombre(); ?>" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la descripcion"  value="<?php echo $empresa->getDescripcion(); ?>"required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Razon Social</label>
                        <input type="text" name="razonSocial" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la Razon Social" value="<?php echo $empresa->getRazonSocial(); ?>"required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Año de Creacion</label>
                        <input type="number" name="anioCreacion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el Año de Creacion" value="<?php echo $empresa->getAnioCreacion(); ?>"required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">ubicacion</label>
                        <input type="text" name="ubicacion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la ubicacion" value="<?php echo $empresa->getUbicacion(); ?>"required="">
                    </div>
                </div>
                <section class="containerCU-sectionArriba-formAbajo">
            <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear">
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert">
                        <?php if (isset($_POST["actualizar"])) { ?>
                        <div class="alert alert-success alert-dismissible fade show containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert-alerta"
                            role="alert">Empresa actualizado exitosamente.</div>
                        <?php } ?>
                    </div>
                </section>
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito">
                        <button class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito-botonCrearUsuario" type="submit" name="actualizar">Actualizar</button>
                    </div>
                </section>
            </div>
        </section>
            </form>
        </section>
        
    </section>
    
    <div class="containerVD-cardPC-abajoVolver">
                <div class="containerVD-cardPC-abajoVolver-botones mt-5">
                    <a class="containerVD-cardPC-abajoVolver-botones-linkCard" href="index.php?pid=<?php echo base64_encode("presentacion/empresas/listadoEmpresas.php")  ?>">Volver</a>
                </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>