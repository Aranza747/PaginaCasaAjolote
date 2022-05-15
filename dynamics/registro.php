    <?php
        session_name("sesion");
         session_id("1");
        session_start();
        if(isset($_SESSION["apodo"])){
            header("location : ./sesion.php");
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una cuenta</title>
</head>
<body>
    <form action="../dynamics/sesion.php" method="post">
        <fieldset>
            <link href="../statics/styles/registro.css" type="text/css" rel="stylesheet">
            
            <legend class="font1" >Crear una cuenta</legend>

            <label class="font2" for="apodo"> Apodo: </label>
                <input type="texto" name="apodo"> <br> <br>

            <label class="font2" for="nombre"> Nombre: </label>
                <input type="texto" name="nombre"> <br> <br>

            <label class="font2" for="apellido"> Apellido: </label>
                <input type="texto" name="apellido"> <br> <br>

            <label class="font2" for="casa"> Casa: </label>
                <select class="font2" name="casa">
                    <option value="ajolotes">Ajolotes</option>
                    <option value="vaquitas">Vaquitas marinas</option>
                    <option value="teporingos">Teporingos</option>
                    <option value="halcones">Halcones</option>
                </select> <br> <br>

            <button class="font2" type="submit">Crear</button>
        </fieldset>
    </form>
</body>
</html>