<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$error = -1;
$nombre = "";
$descripcion = "";
$razonSocial = "";
$anioCreacion = "";
$ubicacion = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $razonSocial = $_POST["razonSocial"];
    $anioCreacion = $_POST["anioCreacion"];
    $ubicacion = $_POST["ubicacion"];;
    
    $empresa = new Empresa("", $nombre, $descripcion, "", $razonSocial, $anioCreacion, $ubicacion);
    if(!$empresa -> existeEmpresa()){
        $empresa -> registrar();
        $error = 0;
    }else{
        $error = 1;
    }
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

<div class="containerCE"> 
    <h1 class="titulos">Crear Empresa</h1>
    <section class="containerCE-sectionArriba">
        <section class="containerCE-sectionArriba-formArriba">
            <form class="formlario" action=<?php echo "index.php?pid=" .base64_encode("presentacion/empresas/crearEmpresas.php")."&nos=true" ?> method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el nombre" value="<?php echo $nombre; ?>" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la ubicacion" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Añade una descripcion" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Razón Social</label>
                        <input type="text" name="razonSocial" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la Razon Social" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Año de Creación</label>
                        <input type="number" name="anioCreacion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Año de Creacion" required="">
                    </div>
                </div>
                <section class="containerCE-sectionArriba-formAbajo">
                    <div class="containerCE-sectionArriba-formAbajo-containerBotonCrear">
                        <section class="containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta">
                            <div class="containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert">
                                <?php if (isset($_POST["registrar"])) { ?>
                                <div class="alert alert-success alert-dismissible fade show containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert-alerta"
                                    role="alert">Empresa creada exitosamente.</div>
                                <?php } ?>
                            </div>
                        </section>
                        <section class="containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionBoton">
                            <div class="containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito">
                                <button class="containerCE-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito-botonCrearUsuario" name="registrar">Registrar</button>
                            </div>
                        </section>
                    </div>
                </section>
            </form>
        </section>
        
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>