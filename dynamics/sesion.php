<?php
    session_name("sesion");
    session_id("1");
    session_start();
    
    $apodo = (isset($_POST["apodo"])&& $_POST["apodo"] != "")? $_POST["apodo"] : false;
    
    if ($apodo!=false){
        $_SESSION["apodo"]= $apodo;
        echo "El usuario con sesion iniciada es:". $_SESSION["apodo"];
        echo "
        <form action='./cerrarsesion.php' method='post' target='_self'>
            <button>Cerrar sesion </button>
        </form>
    ";
    }
    else if (isset($_SESSION["apodo"])){
            echo"El usuario con sesion iniciada es: ". $_SESSION["apodo"];
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