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
            <legend>Crear una cuenta</legend>
            <label for="apodo"> Apodo: </label>
                <input type="texto" name="apodo"> <br> <br>
            <label for="nombre"> Nombre: </label>
                <input type="texto" name="nombre"> <br> <br>
            <label for="apellido"> Apellido: </label>
                <input type="texto" name="apellido"> <br> <br>
            <label for="casa"> Casa: </label>
                <select name="casa">
                    <option value="ajolotes">Ajolotes</option>
                    <option value="vaquitas">Vaquitas marinas</option>
                    <option value="teporingos">Teporingos</option>
                    <option value="halcones">Halcones</option>
                </select> <br> <br>
            <button type="submit">Crear</button>
        </fieldset>
    </form>
</body>
</html>