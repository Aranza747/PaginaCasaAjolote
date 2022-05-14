<?php
    echo "
        <form action='./avatar.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Crea un avatar</legend>
                <label for='avatar'>Seleccione una parte del cuerpo: </label>
                <select name='avatar'>
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
    //recibe la imagen y la guarda en la carpeta
    if(isset($_FILES['foto'])){
        //$nombre_foto = (isset($_POST["foto"])&& $_POST["foto"] != "")? $_POST["foto"] : false;
        echo $_FILES['foto']['name'];
        $foto= $_FILES['foto']['tmp_name'];
        $name =  $_FILES['foto']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        rename($foto,"../statics/avatar/$name.$ext");
        echo "
            <h1>Tu imagen se cargó correctamente</h1>         
            <button><a href='./galeria.php'>Ver imágenes</a></button>
        ";
    }

    else{
        $carpeta=opendir("../statics/avatar");
        $cabeza=[];  // no se si se tenga que cambiar su nombre al usar base de datos
        $tronco=[];
        $piernas=[];
        $pies=[];
        $hay_archivos=true;
        $i=0;

        /*switch($avatar){
            case "cabeza";
                $cabeza = $foto;
/*/

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $foto1=readdir($carpeta);
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
                                <img src='../statics/avatar/$value'/ width='200px'>
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
                                <img src='../statics/avatar/$value'/ width='200px'>
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
                                <img src='../statics/avatar/$value'/ width='200px'>
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
                            <img src='../statics/avatar/$value'/ width='200px'>
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