<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$error = -1;
$nombre = "";
$correo = "";    
$password = "";
$cargo = "";
$edad = "";
$direccion = "";
$cedula = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $cargo = $_POST["cargo"];
    $edad = $_POST["edad"];
    $direccion = $_POST["direccion"];
    $cedula = $_POST["cedula"];


    $usuario = new Usuario("", $nombre, $correo, $password, $cargo, $edad, $direccion, $cedula, "");
                    if(!$usuario -> existeCorreo()){
                        $usuario -> registrar();
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

<div class="containerCU"> 
    <h1 class="titulos">Crear Usuario</h1>
    <section class="containerCU-sectionArriba">
        <section class="containerCU-sectionArriba-formArriba">
            <form class="containerCU-sectionArriba-formArriba-formlarioCU" action=<?php echo "index.php?pid=" .base64_encode("presentacion/usuarios/crearUsuarios.php")."&nos=true" ?> method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el nombre" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Cédula</label>
                        <input type="number" name="cedula" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el número de identificación"  required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Correo</label>
                        <input type="email" name="correo" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el correo" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la contraseña" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Cargo</label>
                        <input type="text" name="cargo" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe el cargo" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Edad</label>
                        <input type="number" name="edad" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la edad del usuario" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label id="crearTrasnporte-label" for="exampleFormControlInput1">Dirección</label>
                        <input type="text" name="direccion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Escribe la dirección" required="">
                    </div>
                </div>
                <section class="containerCU-sectionArriba-formAbajo">
            <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear">
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionAlerta-alert">
                        <?php 
                            if(isset($_POST['registrar'])){
                                if($error == 0){?>
                                    <div class="alert alert-success" role="alert"> Usuario registrado exitosamente.</div>
                                    <?php } else if($error == 1) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo ("El correo ".$correo. " ya existe")?>
                                        </div>
                                    <?php } else if($error == 2) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo "El tipo de las fotos solo puede ser png, jpg o jpeg"?>
                                        </div>
                                    <?php }else if($error == 3) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo "El nombre de alguna foto es muy largo"?>
                                        </div>
                                    <?php }else if($error == 4) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo "El tamaño de alguna de las imagenes es muy grande TAMAÑO MAX= 4MB"?>
                                        </div>
                                    <?php } 
                            }
                        ?>
                    </div>
                </section>
                <section class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton">
                    <div class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito">
                        <button class="containerCU-sectionArriba-formAbajo-containerBotonCrear-sectionBoton-botonsito-botonCrearUsuario" type="submit" name="registrar">Registrar</button>
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