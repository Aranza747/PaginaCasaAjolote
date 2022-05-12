<?php
    echo "
        <form action='./archivos.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Subir archivos para el plano de la sala comun</legend>
                ¿Qué parte de la casa es?: <input type='text' name='nombre'> <br> <br>
                <input type='file' name='archivo'> <br> <br>
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form>
    ";
/*
    if(isset($_FILES['archivo'])){
        $nombre = $_POST['nombre'];
        $name =  $_FILES['archivo']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        echo $name;
        $arch= $_FILES['archivo']['tmp_name'];
        rename($arch,"./statics/$nombre.$ext");
    }
    else{
        $carpeta=opendir("./statics");
        $archivos=[];
        $hay_archivos=true;
        $i=0;
        //guarda el nombre de los archivps en un arreglo
        while ($hay_archivos==true){
            $archivo1=readdir($carpeta);
            if($archivo1!=false){
                $i++;
                array_push($archivos, $archivo1);
            }
            else{
                $hay_archivos=false;
            }
        }
        print_r($archivos);
        if($i!=0){
            echo "<h1>Estos son mis archivos:>/h1>";
            foreach($archivos as $llave => $value){
                if ($value!='.'&& $value!='..')//{
                echo "<img src='./statics/$value'/>";
            //}
            }
        }
        else {
            echo "no tienes imagenes";
        }
    }*/
?>  