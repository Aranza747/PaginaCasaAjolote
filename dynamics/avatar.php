<?php
    echo "
        <form action='./avatar.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Crea un avatar</legend>
                <label for='tipo'>Seleccione una parte del cuerpo: </label>
                <select name='tipo'  id='tipo'>
                    <option value='cabeza'>Cabeza
                    <option value='tronco'>Tronco
                    <option value='piernas'>Piernas
                    <option value='pies'>Pies 
                </select> <br><br>
                <input type='file' name='foto'> <br> <br>
                    <br><br>
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form>
    ";

    $tipo=(isset($_POST["tipo"])&& $_POST["tipo"] != "")? $_POST["tipo"] : false;
    //recibe la imagen y la guarda en la carpeta
    if(isset($_FILES['foto'])){
        //$nombre_foto = (isset($_POST["foto"])&& $_POST["foto"] != "")? $_POST["foto"] : false;
        echo $_FILES['foto']['name'];
        $foto= $_FILES['foto']['tmp_name'];
        $name =  $_FILES['foto']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        switch($avatar){
            case "cabeza":
                rename($foto,"../statics/avatar/cabeza/$name.$ext");
                break;
            case "tronco":
                rename($foto,"../statics/avatar/tronco/$name.$ext");
                break;
            case "piernas":
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
        switch($avatar){
            case "cabeza":
                $carpetaCa=opendir("../statics/avatar/cabeza");
                break;
            case "tronco":
                $carpetaTr=opendir("../statics/avatar/tronco");
                break;
            case "piernas":
                $carpetaPr=opendir("../statics/avatar/piernas");
                    break;
            default:
                $carpetaPs=opendir("../statics/avatar/pies");
        }
        $cabeza=[];  // no se si se tenga que cambiar su nombre al usar base de datos
        $tronco=[];
        $piernas=[];
        $pies=[];
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            
            switch($avatar){
                case "cabeza":
                    $foto1=readdir($carpetaCa);
                    break;
                case "tronco":
                    $foto1=readdir($carpetaTr);
                    break;
                case "piernas":
                    $foto1=readdir($carpetaPr);
                        break;
                default:
                    $foto1=readdir($carpetaPs);
            }
            
            if($foto1!=false){
                $i++;
                    switch($avatar){
                        case "cabeza":
                            array_push($cabeza, $foto1);
                            break;
                        case "tronco":
                            array_push($tronco, $foto1);
                            break;
                        case "piernas":
                            array_push($piernas, $foto1);
                                break;
                        default:
                            array_push($pies, $foto1);
                        }
                    }
            else{
                $hay_archivos=false;
            }
        }
        
        if($i>=3){
            echo "<h1>Fotos para que conozcas mas sobre mi</h1>";
            switch($avatar){
                case "cabeza":
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
                    break;
                case "tronco":
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
                    break;
                case "piernas":
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
                    break;
                default:
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
        }
        else {
            echo "Aún no hay imágenes";
        }        
    }

?>   