<?php
    $con = mysqli_connect("localhost", "root", "", "db_arteraneo");
 
    
    if($con){
        echo "Conexion con la base de datos realizada con exito";
    } else {
        echo "No se puede conectar con la base de datos";
    }
    

    
?>