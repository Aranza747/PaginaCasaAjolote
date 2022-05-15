<?php

    include('./enlazando.php'); 
    $conexion = connect(); 
    
    $apodo = $_POST["Apodo"]; 
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $casa = $_POST["Casa"];

    echo $apodo; 
    echo $nombre; 
    echo $apellido; 
    echo $casa; 
    //subiendo los datos a la tabla de datos
    $peticion = "INSERT INTO usuario VALUES('$apodo', '$nombre', '$apellido', '$casa')"; //para insertar registros
    var_dump($peticion); 
    $query = mysqli_query($conexion, $peticion); 
    var_dump($query); 

?>
