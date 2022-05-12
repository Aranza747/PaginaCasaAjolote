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
    <title>Iniciar sesion</title>
</head>
<body>
    <h1>Casas CW 2022</h1>
<form action="./sesion.php" method="post" target="_self">
        <fieldset>
            <legend>Inicio de sesión</legend>
            <label for="Usuario"> Apodo: </label>
                <input type="texto" name="nombre_usuario"> <br> <br>
            <button type="submit">Ingresar</button>
            <button type=""></button>
        </fieldset>
    </form>  
    <a href="../registro.html">Crear cuenta</a>
</body>
</html>