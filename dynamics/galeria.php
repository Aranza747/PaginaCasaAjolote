<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link href="../statics/styles/galeria.css" type="text/css" rel="stylesheet">

</head>
<body>
<?php
    session_name("sesion");
    session_id("1");
    session_start();

$apodo = (isset($_POST["apodo"])&& $_POST["apodo"] != "")? $_POST["apodo"] : false;
$casa = (isset($_POST["casa"])&& $_POST["casa"] != "")? $_POST["casa"] : false;

    echo "
        <form action='./galeria.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Subir archivos a la galeria</legend>
                Nombre de la imagen: <input type='text' name='nombre_foto'> <br> <br>
                Descripción: <input type='text' name='descripcion_foto'> <br> <br>
                <input type='file' name='foto'> <br> <br>";
    //date_default_timezone_set("America/Mexico_City");
    echo"            
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form><br>
        <button><a href='./sesion.php'>Regresar al inicio</a></button> <br><br>
        <form action='./cerrarsesion.php' method='post' target='_self'>
                    <button>Cerrar sesion </button>
                </form>
    ";
    //$descripcion=(isset($_POST["descripcion_foto"])&& $_POST["descripcion_foto"] != "")? $_POST["descripcion_foto"] : false;
    if(isset($_FILES['foto'])){
        $nombre_foto = (isset($_POST["nombre_foto"])&& $_POST["nombre_foto"] != "")? $_POST["nombre_foto"] : false;
       // $descripcion=(isset($_POST["descripcion_foto"])&& $_POST["descripcion_foto"] != "")? $_POST["descripcion_foto"] : false;
        echo $_FILES['foto']['name'];
        $foto= $_FILES['foto']['tmp_name'];
        $name =  $_FILES['foto']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        switch($_SESSION["casa"]){
            case "ajolotes":
                rename($foto,"../statics/ajolotes/galeria/$nombre_foto.$ext");
                break;
            case "vaquitas":
                rename($foto,"../statics/vaquitas/galeria/$nombre_foto.$ext");
                break;
            case "teporingos":
                rename($foto,"../statics/teporingos/galeria/$nombre_foto.$ext");
                break;
            default:
            rename($foto,"../statics/halcones/galeria/$nombre_foto.$ext");
        }
                echo "
            <h1>Tu imagen se cargó correctamente</h1>         
            <button>    <a href='./galeria.php'>Ver imágenes</a></button>
        ";
    }

    else{
        //$descripcion=(isset($_POST["descripcion_foto"]));
        switch ($_SESSION["casa"]) {
            case 'ajolotes':
                $carpeta=opendir("../statics/ajolotes/galeria");
                $ajo_galeria=[]; // no se si se tenga que cambiar su nombre al usar base de datos
                break;
            case 'vaquitas':
                $carpeta=opendir("../statics/vaquitas/galeria");
                $vaq_galeria=[];
                break;
            case 'teporingos':
                $carpeta=opendir("../statics/teporingos/galeria");
                $tep_galeria=[];
                break;
            default:
                $carpeta=opendir("../statics/halcones/galeria");
                $hal_galeria=[];
                break;
        }
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $foto1=readdir($carpeta);
            if($foto1!=false){
                $i++;
                switch ($_SESSION["casa"]) {
                    case 'ajolotes':
                        array_push($ajo_galeria, $foto1);
                        break;
                    case 'vaquitas':
                        array_push($vaq_galeria, $foto1);
                        //$descripcion=(isset($_POST["descripcion_foto"]));
                        break;
                    case 'teporingos':
                        array_push($tep_galeria, $foto1);
                        break;
                    default:
                        array_push($hal_galeria, $foto1);
                        break;
                }
            }
            else{
                $hay_archivos=false;
            }
        }
        //date_default_timezone_set("America/Mexico_City");
        switch ($_SESSION["casa"]) {
            case 'ajolotes':
                //date_default_timezone_set("America/Mexico_City");
                if($i>=3){
                    echo "<h1>Fotos para que conozcas mas sobre los ajolotes</h1>";
                    foreach($ajo_galeria as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>    
                                <img src='../statics/ajolotes/galeria/$value'/ width='200px'>
                            </td>
                        </tr>
                        <table>
                        ";
                    }
                }
                else {
                    echo "Aún no hay imágenes";
                }        
                break;
            case 'vaquitas':
                //date_default_timezone_set("America/Mexico_City");
                if($i>=3){
                    echo "<h1>Fotos para que conozcas mas sobre las vaquitas marinas</h1>";
                    foreach($vaq_galeria as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/vaquitas/galeria/$value'/ width='200px'> <br>
                                ";
                                echo $descripcion;
                           echo" </td>
                        </tr>
                        <table>
                        ";
                    }
                }
                else {
                    echo "Aún no hay imágenes";
                }   
                break;
            case 'teporingos':
                
                if($i>=3){
                    echo "<h1>Fotos para que conozcas mas sobre los teporingos</h1>";
                    foreach($tep_galeria as $llave => $value){
                        
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/teporingos/galeria/$value'/ width='200px'> <br>
                            </td>
                        </tr>
                        <table>
                        ";
                    }  
                }
                else {
                    echo "Aún no hay imágenes";
                }                   
                break;
            default:
                //date_default_timezone_set("America/Mexico_City");
                if($i>=3){
                    echo "<h1>Fotos para que conozcas mas sobre los halcones</h1>";
                    foreach($hal_galeria as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/halcones/galeria/$value'/ width='200px'>
                            </td>
                        </tr>
                        <table>
                        ";
                    }
                }
                else {
                    echo "Aún no hay imágenes";
                }                   
                break;
            }    
    }

?>      
</body>
</html>
