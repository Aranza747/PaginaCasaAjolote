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
            echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los ajolotes
            <br><br>
            <button><a href='./galeria.php'>Galería</a></button>
            <button><a href='./sala.php'>Sala comun</a></button>
            <button><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
            break;
        case "vaquitas":
            echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de las vaquitas marinas
            <br><br>
            <button><a href='./galeria.php'>Galería</a></button>
            <button><a href='./sala.php'>Sala comun</a></button>
            <button><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
            break;
        case "teporingos":
                echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los teporingos
                <br><br>
                <button><a href='./galeria.php'>Galería</a></button>
                <button><a href='./sala.php'>Sala comun</a></button>
                <button><a href='./avatar.php'>Personalizar avatar</a></button>
                ";
                break;
        default:
            echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los halcones
            <br><br>
            <button><a href='./galeria.php'>Galería</a></button>
            <button><a href='./sala.php'>Sala comun</a></button>
            <button><a href='./avatar.php'>Personalizar avatar</a></button>
            ";
    }

        echo "
        <form action='./cerrarsesion.php' method='post' target='_self'>
            <br><br><button>Cerrar sesion </button>
        </form>
    ";
    }

    //esto aparece cuando el usuario regresa de la galeria o la sala
    else if (isset($_SESSION["apodo"])){
            switch($_SESSION["casa"]){
                case "ajolotes":
                    echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los ajolotes
                    <br><br>
                    <button><a href='./galeria.php'>Galería</a></button>
                    <button><a href='./sala.php'>Sala comun</a></button>
                    <button><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
                    break;
                case "vaquitas":
                    echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de las vaquitas marinas
                    <br><br>
                    <button><a href='./galeria.php'>Galería</a></button>
                    <button><a href='./sala.php'>Sala comun</a></button>
                    <button><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
                    break;
                case "teporingos":
                        echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los teporingos
                        <br><br>
                        <button><a href='./galeria.php'>Galería</a></button>
                        <button><a href='./sala.php'>Sala comun</a></button>
                        <button><a href='./avatar.php'>Personalizar avatar</a></button>
                        ";
                        break;
                default:
                    echo "Bienvenid@ ". $_SESSION["apodo"]." a la casa de los halcones
                    <br><br>
                    <button><a href='./galeria.php'>Galería</a></button>
                    <button><a href='./sala.php'>Sala comun</a></button>
                    <button><a href='./avatar.php'>Personalizar avatar</a></button>
                    ";
            }
        
            echo "
                <form action='./cerrarsesion.php' method='post' target='_self'>
                    <button>Cerrar sesion </button>
                </form>
            ";
        }
       
    else {
        header("location:./InicioSesion");
    }
    
?>