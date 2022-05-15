<?php
session_name("sesion");
session_id("1");
session_start();

$apodo = (isset($_POST["apodo"])&& $_POST["apodo"] != "")? $_POST["apodo"] : false;
$casa = (isset($_POST["casa"])&& $_POST["casa"] != "")? $_POST["casa"] : false;

    echo "
        <form action='./sala.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Subir imagenes para el plano de la sala común</legend>
                Nombre de la imagen: <input type='text' name='nombre_sala'> <br> <br> 
                Descripción: <input type='text' name='descripcion_sala'> <br> <br>
                <input type='file' name='sala'> <br> <br>
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form>
        <button><a href='./sesion.php'>Regresar al inicio</a></button> <br><br>
        <form action='./cerrarsesion.php' method='post' target='_self'>
                    <button>Cerrar sesion </button>
                </form>
    ";

    if(isset($_FILES['sala'])){
        $nombre_sala = (isset($_POST["nombre_sala"])&& $_POST["nombre_sala"] != "")? $_POST["nombre_sala"] : false;
        echo $_FILES['sala']['name'];
        $sala= $_FILES['sala']['tmp_name'];
        $name =  $_FILES['sala']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        switch($_SESSION["casa"]){
            case "ajolotes":
                rename($sala,"../statics/ajolotes/sala/$nombre_sala.$ext");
                break;
            case "vaquitas":
                rename($sala,"../statics/vaquitas/sala/$nombre_sala.$ext");
                break;
            case "teporingos":
                rename($sala,"../statics/teporingos/sala/$nombre_sala.$ext");
                break;
            default:
            rename($sala,"../statics/halcones/sala/$nombre_sala.$ext");
        }
                echo "
            <h1>Tu imagen se cargó correctamente</h1>         
            <button>    <a href='./sala.php'>Ver imágenes</a></button>
        ";
        /*rename($sala,"../statics/plano/$nombre_sala.$ext");
        echo "        
            <button><a href='./sala.php'>Ver imágenes</a></button>
        ";*/
    }
    else{
        switch ($_SESSION["casa"]) {
            case 'ajolotes':
                $carpeta=opendir("../statics/ajolotes/sala");
                $ajo_sala=[]; // no se si se tenga que cambiar su nombre al usar base de datos
                break;
            case 'vaquitas':
                $carpeta=opendir("../statics/vaquitas/sala");
                $vaq_sala=[];
                break;
            case 'teporingos':
                $carpeta=opendir("../statics/teporingos/sala");
                $tep_sala=[];
                break;
            default:
                $carpeta=opendir("../statics/halcones/sala");
                $hal_sala=[];
                break;
        }
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $sala1=readdir($carpeta);
            if($sala1!=false){
                $i++;
                switch ($_SESSION["casa"]) {
                    case 'ajolotes':
                        array_push($ajo_sala, $sala1);
                        break;
                    case 'vaquitas':
                        array_push($vaq_sala, $sala1);
                        break;
                    case 'teporingos':
                        array_push($tep_sala, $sala1);
                        break;
                    default:
                        array_push($hal_sala, $sala1);
                        break;
                }
            }
            else{
                $hay_archivos=false;
            }
        }

        switch ($_SESSION["casa"]) {
            case 'ajolotes':
                if($i>=3){
                    echo "<h1>Conoce la sala común de los ajolotes</h1>";
                    foreach($ajo_sala as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/ajolotes/sala/$value'/ width='200px'>
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
                if($i>=3){
                    echo "<h1>Conoce la sala común de las vaquitas marinas</h1>";
                    foreach($vaq_sala as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/vaquitas/sala/$value'/ width='200px'>
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
            case 'teporingos':
                if($i>=3){
                    echo "<h1>Conoce la sala común de los teporingos</h1>";
                    foreach($tep_sala as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/teporingos/sala/$value'/ width='200px'>
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
            if($i>=3){
                echo "<h1>Conoce la sala común de los halcones</h1>";
                foreach($hal_sala as $llave => $value){
                    if ($value!='.' && $value!='..')
                    echo "
                    <table border=1px>
                    <tr>
                        <td>
                            <img src='../statics/halcones/sala/$value'/ width='200px'>
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
    /*else{
        $carpeta=opendir("../statics/plano");
        $plano=[];  // no se si se tenga que cambiar su nombre al usar base de datos
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $sala1=readdir($carpeta);
            if($sala1!=false){
                $i++;
                array_push($plano, $sala1);
            }
            else{
                $hay_archivos=false;
            }
        }
        if($i>=3){
            
            echo "<h1>Así se ve nuestra sala común</h1>";
            foreach($plano as $llave => $value){
                if ($value!='.' && $value!='..')
                echo "
                <table border=1px>
                <tr>
                    <td>
                        <img src='../statics/plano/$value'/ width='200px'>
                    </td>
                </tr>
                <table>
                ";
            }
        }
        else {
            echo "Aún no hay imágenes";
        }
    }*/


?>  