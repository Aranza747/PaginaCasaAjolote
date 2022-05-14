<?php
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
    ";

    if(isset($_FILES['sala'])){
        $nombre_sala = (isset($_POST["nombre_sala"])&& $_POST["nombre_sala"] != "")? $_POST["nombre_sala"] : false;
        echo $_FILES['sala']['name'];
        $sala= $_FILES['sala']['tmp_name'];
        $name =  $_FILES['sala']['name'];
        $ext= pathinfo($name, PATHINFO_EXTENSION);
        rename($sala,"../statics/plano/$nombre_sala.$ext");
        echo "        
            <button><a href='./sala.php'>Ver imágenes</a></button>
        ";
    }

    else{
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
    }

?>  