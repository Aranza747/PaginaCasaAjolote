<?php

    /*session_name("sesionChida");
    session_id("123456789");
    session_start();

    if(isset($_SESSION["nombre"])){
        header("location: ./sesion.php");
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Iniciar sesion</title>
    <link href="../statics/styles/sesion.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1 class="title" ><center>Casas CW 2022</center></h1>
<form action="./sesion.php" method="post" target="_self">
        <fieldset>
            <legend id="title2" class="text">Inicio de sesión</legend>
            <label class="text" for="Usuario"> Apodo: </label>
                <input type="texto" name="nombre_usuario"> <br> <br>
            <button id="button" class="text" type="submit">Ingresar</button>
        </fieldset>
    </form>  
    <br><a href="../registro.html" class="text"><center>Crear cuenta</center></a>
</body>
</html>