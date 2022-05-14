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
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="./sesion.php" method="post" target="_self">
        <fieldset>
            <legend>Iniciar sesion</legend>
            <label for="apodo"> Apodo: </label>
                <input type="texto" name="apodo"> <br> <br>
            <button type="submit">Ingresar</button> <br><br>
        </fieldset>
     </form>
        <form action="./registro.php" method="post" target="_self">
            <button>Crear cuenta</button>
        </form>
    </form>
</body>
</html>    