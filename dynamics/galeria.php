<?php
    echo "
        <form action='./galeria.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Subir archivos a la galeria</legend>
                Nombre de la imagen: <input type='text' name='nombre_foto'> <br> <br>
                Descripción: <input type='text' name='descripcion_foto'> <br> <br>
                <input type='file' name='foto'> <br> <br>
                <input type='submit' value='Subir'> 
                <input type='reset' value='Borrar'>
            </fieldset>
        </form>
    ";

    if(isset($_FILES['foto'])){
        $nombre_foto = (isset($_POST["nombre_foto"])&& $_POST["nombre_foto"] != "")? $_POST["nombre_foto"] : false;
        echo $_FILES['foto']['name'];
        $foto= $_FILES['foto']['tmp_name'];
        $name =  $_FILES['foto']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        rename($foto,"../statics/galeria/$nombre_foto.$ext");
        echo "
            <h1>Tu imagen se cargó correctamente</h1>         
            <button><a href='./galeria.php'>Ver imágenes</a></button>
        ";
    }

    else{
        $carpeta=opendir("../statics/galeria");
        $galeria=[];  // no se si se tenga que cambiar su nombre al usar base de datos
        $hay_archivos=true;
        $i=0;

        while($hay_archivos) {//ya no se iguala a true porque ya se hizo anteriormente
            $foto1=readdir($carpeta);
            if($foto1!=false){
                $i++;
                array_push($galeria, $foto1);
            }
            else{
                $hay_archivos=false;
            }
        }
        if($i>=3){
            echo "<h1>Fotos para que conozcas mas sobre mi</h1>";
            foreach($galeria as $llave => $value){
                if ($value!='.' && $value!='..')
                echo "
                <table border=1px>
                <tr>
                    <td>
                        <img src='../statics/galeria/$value'/ width='200px'>
                    </td>
                </tr>
                <table>
                ";
            }
        }
        else {
            echo "Aún no hay imágenes";
        }
    }

?>  