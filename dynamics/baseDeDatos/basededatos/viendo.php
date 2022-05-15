<?php

include("./enlazando.php"); 
$conexion = connect(); 

$peticion = "SELECT * FROM registrocasas"; 
$query = mysqli_query($conexion, $peticion); 


while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
    var_dump($row); 
    echo "<br><br>"; 
}
?>