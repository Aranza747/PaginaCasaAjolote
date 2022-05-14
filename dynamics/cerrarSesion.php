<?php
session_name("sesion");
session_id("1");
session_start();

if(isset($_SESSION["apodo"])){
    session_unset();
    session_destroy();
    header("location: ./InicioSesion.php");
}
?>