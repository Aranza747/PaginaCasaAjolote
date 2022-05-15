<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESION</title>
    <link href="../statics/styles/sesion.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
    session_name("sesion");
    session_id("1");
    session_start();

    $apodo = (isset($_POST["apodo"])&& $_POST["apodo"] != "")? $_POST["apodo"] : false;
    $casa = (isset($_POST["casa"])&& $_POST["casa"] != "")? $_POST["casa"] : false;
    if ($apodo!=false && $casa != false){
        $_SESSION["apodo"]= $apodo;
        $_SESSION["casa"]=$casa;
//esto aparece si el usuario se registra
    switch($_SESSION["casa"]){
        case "ajolotes":
            echo "<p class='title'> Bienvenid@ ". $_SESSION["apodo"]." a la casa de los ajolotes </p>
            <br><br>
            <button class='font2'><a href='./galeria.php'>Galería</a></button>
            <button class='font2'><a href='./sala.php'>Sala comun</a></button>
            <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
            break;
        case "vaquitas":
            echo " <p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de las vaquitas marinas</p>
            <br><br>
            <button class='font2'><a href='./galeria.php'>Galería</a></button>
            <button class='font2'><a href='./sala.php'>Sala comun</a></button>
            <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
            break;
        case "teporingos":
                echo " <p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de los teporingos</p>
                <br><br>
                <button class='font2'><a href='./galeria.php'>Galería</a></button>
                <button class='font2'><a href='./sala.php'>Sala comun</a></button>
                <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
                ";
                break;
        default:
            echo " <p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de los halcones</p>
            <br><br>
            <button class='font2'><a href='./galeria.php'>Galería</a></button>
            <button class='font2'><a href='./sala.php'>Sala comun</a></button>
            <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
            break;
    }

        echo "
        <form action='./cerrarsesion.php' method='post' target='_self'>
            <br><br><button class='font2'>Cerrar sesion </button>
        </form>
    ";
    }

    //esto aparece cuando el usuario regresa de la galeria o la sala
    else if (isset($_SESSION["apodo"])){
            switch($_SESSION["casa"]){
                case "ajolotes":
                    echo " <p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de los ajolotes</p>
                    <br><br>
                    <button class='font2'><a href='./galeria.php'>Galería</a></button>
                    <button class='font2'><a href='./sala.php'>Sala comun</a></button>
                    <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
                    break;
                case "vaquitas":
                    echo "<p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de las vaquitas marinas</p>
                    <br><br>
                    <button class='font2'><a href='./galeria.php'>Galería</a></button>
                    <button class='font2'><a href='./sala.php'>Sala comun</a></button>
                    <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
                    break;
                case "teporingos":
                        echo " <p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de los teporingos</p>
                        <br><br>
                        <button class='font2'><a href='./galeria.php'>Galería</a></button>
                        <button class='font2'><a href='./sala.php'>Sala comun</a></button>
                        <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
                        ";
                        break;
                default:
                    echo "<p class='title'>Bienvenid@ ". $_SESSION["apodo"]." a la casa de los halcones</p>
                    <br><br>
                    <button class='font2'><a href='./galeria.php'>Galería</a></button>
                    <button class='font2'><a href='./sala.php'>Sala comun</a></button>
                    <button class='font2'><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
            }
        
            echo "
                <form action='./cerrarsesion.php' method='post' target='_self'>
                    <button class='font2'>Cerrar sesion </button>
                </form>
            ";
        }
       
    else {
        header("location:./InicioSesion");
    }  
?>
</body>
</html>