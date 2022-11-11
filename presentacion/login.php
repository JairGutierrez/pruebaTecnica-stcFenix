<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssBarra/stylesBarra.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--FUENTES-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body id="bodyLogin">
    <div class="containerLogin">
        <h1 id="tituloLogin">Inicio de Sesión</h1>
        <div class="containerLogin-formLogin">
            <?php
                                    if(isset($_GET["error"])){
                                        if($_GET["error"] == 1){
                                            echo "<div class='alert alert-warning' role='alert'>";
                                            echo "Credenciales invalidas";
                                            echo "</div>";
                                        }else if($_GET["error"] == 2){
                                            echo "<div class='alert alert-danger' role='alert'>";
                                            echo "Perfil Inhabilitado";
                                            echo "</div>";
                                        }
                                        else if($_GET["error"] == 3){
                                            echo "<div class='alert alert-danger' role='alert'>";
                                            echo "Perfil sin validar";
                                            echo "</div>";
                                        }
                                        else if($_GET["error"] == 5){
                                            echo "<div class='alert alert-success' role='alert'>";
                                            echo "Validacion de codigo Exitosa";
                                            echo "</div>";
                                        }
                                    }
                                    ?>
                                    <form class="containerLogin-formLogin-formlario"
                                        action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php")?>&nos=true"
                                        method="post">
                                        <div class="mb-3">
                                            <label id="loginLabel" for="exampleFormControlInput1">Correo</label>
                                            <input id="loginInput" name="correo" type="email" class="form-control" id="Email"
                                                aria-describedby="emailHelp" placeholder="correo institucional">
                                        </div>
                                        <div class="mb-3">
                                            <label id="loginLabel" for="exampleFormControlInput1">Contraseña</label>
                                            <input id="loginInput" name="password" type="password" class="form-control" id="Password"
                                                placeholder="contraseña">
                                        </div>
                                        <button type="submit" name="autenticar" class="containerLogin-formLogin-formlario-boton mb-3">Ingresar</button>
                                    </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>