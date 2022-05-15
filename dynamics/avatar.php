<?php

    session_name("sesion");
    session_id("1");
    session_start();

    $apodo = (isset($_POST["apodo"])&& $_POST["apodo"] != "")? $_POST["apodo"] : false;
    $casa = (isset($_POST["casa"])&& $_POST["casa"] != "")? $_POST["casa"] : false;

    echo "
        <form action='./avatar.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Crea un avatar</legend>
                Nombre de la imagen: <input type='text' name='nombre_foto'> <br> <br>
                <label for='tipo'>Seleccione una parte del cuerpo: </label>
                <select name='tipo'  id='tipo'>
                    <option value='cabeza'>Cabeza</option>
                    <option value='tronco'>Tronco</option>
                    <option value='piernas'>Piernas</option>
                    <option value='pies'>Pies </option>
                </select> <br><br>
                <input type='file' name='foto'> <br> <br>
                    <br><br>
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form>

        <button><a href='./sesion.php'>Regresar al inicio</a></button> <br><br>
        <form action='./cerrarsesion.php' method='post' target='_self'>
                    <button>Cerrar sesion </button>
                </form>
    ";

        $tipo=(isset($_POST["tipo"])&& $_POST["tipo"] != "")? $_POST["tipo"] : false;
    //recibe la imagen y la guarda en la carpeta
    if(isset($_FILES['foto'])){
        $nombre_foto = (isset($_POST["foto"])&& $_POST["foto"] != "")? $_POST["foto"] : false;
        echo $_FILES['foto']['name'];
        $foto= $_FILES['foto']['tmp_name'];
        $name =  $_FILES['foto']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        switch($tipo){
            case 'cabeza':
                rename($foto,"../statics/avatar/cabeza/$name.$ext");
                break;
            case 'tronco':
                rename($foto,"../statics/avatar/tronco/$name.$ext");
                break;
            case 'piernas':
                rename($foto,"../statics/avatar/piernas/$name.$ext");
                break;
            default:
                rename($foto,"../statics/avatar/pies/$name.$ext");
        }
        echo "
            <h1>Tu imagen se cargó correctamente</h1>         
            <button><a href='./avatar.php'>Ver imágenes</a></button>
        ";
    }

    else{
        //recibe la imagen y la guarda en la carpeta
        switch($tipo=(isset($_POST["tipo"]))){
            case 'cabeza':
                $carpeta=opendir("../statics/avatar/cabeza");
                $cabeza=[];
                break;
            case 'tronco':
                $carpeta=opendir("../statics/avatar/tronco");
                $tronco=[];
                break;
            case 'piernas':
                $carpeta=opendir("../statics/avatar/piernas");
                $piernas=[];
                break;
            default:
                $carpeta=opendir("../statics/avatar/pies");
                $pies=[];
                break;
        }
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $foto1=readdir($carpeta);
            if($foto1!=false){
                $i++;
                    switch($tipo){
                        case 'cabeza':
                            array_push($cabeza, $foto1);
                            break;
                        case 'tronco':
                            array_push($tronco, $foto1);
                            break;
                        case 'piernas':
                            array_push($piernas, $foto1);
                                break;
                        default:
                            array_push($pies, $foto1);
                            break;
                        }
                    }
            else{
                $hay_archivos=false;
            }
        }
        
                    if($i>=3){
                        echo "<h1>Mi cabeza</h1>";
                        foreach($cabeza as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/avatar/cabeza/$value'/ width='200px'>
                            </td>
                        </tr>
                        <table>
                        <br><br>
                        ";
                        }
                    }
                    else {
                        echo "Aún no hay imágenes";
                    } 
        
                    if($i>=3){
                        echo "<h1>Mi tronco</h1>";
                        foreach($tronco as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/avatar/tronco/$value'/ width='200px'>
                            </td>
                        </tr>
                        <table>
                        <br><br>
                        ";
                        }
                    }
                    else {
                        echo "Aún no hay imágenes";
                    } 

                    if($i>=3){
                        echo "<h1>Mis piernas</h1>";
                        foreach($piernas as $llave => $value){
                        if ($value!='.' && $value!='..')
                        echo "
                        <table border=1px>
                        <tr>
                            <td>
                                <img src='../statics/avatar/piernas/$value'/ width='200px'>
                            </td>
                        </tr>
                        <table>
                        <br><br>
                        ";
                        }
                    }
                    else {
                        echo "Aún no hay imágenes";
                    } 
                    
                if($i>=3){
                    echo "<h1>Mis pies</h1>";
                    foreach($pies as $llave => $value){
                    if ($value!='.' && $value!='..')
                    echo "
                    <table border=1px>
                    <tr>
                        <td>
                            <img src='../statics/avatar/pies/$value'/ width='200px'>
                        </td>
                    </tr>
                    <table>
                    <br><br>
                    ";
                    }
                }
                else {
                    echo "Aún no hay imágenes";
                } 
                 
    }

?>   