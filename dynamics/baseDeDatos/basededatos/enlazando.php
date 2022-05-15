<?php

define("DBHOST","localhost"); 
define("DBUSER", "root"); 
define("PASSWORD", ""); 
define("DB", "registrocasas"); 

function connect(){
    $conexion = mysqli_connect(DBHOST,DBUSER,PASSWORD,DB); 
    var_dump($conexion); 
    if(!$conexion){
       mysqli_error(); 
       echo "no se pudo conectar a la base"; 
    }
    return $conexion; 
}
$conexion = connect(); 

?>