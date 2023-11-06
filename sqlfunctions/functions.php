<?php

require_once ("db_connection.class.php");

if(isset($_POST['accion'])){ 
    switch($_POST['accion']){
        case 'eliminar_producto':
            eliminar_producto();

        break;        
        case 'editar_producto':
        editar_producto();

        break;

        case 'insertar_productos':
        insertar_productos();

        break;    
    }

}

function insertar_productos(){

    global $conexion;
    extract($_POST);


        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);
                


    $consulta="INSERT INTO productos (nombre, descripcion, artista, precio, cantidad, id_categoria, imagen)
    VALUES ('$nombre', '$descripcion', '$artista', $precio, $cantidad , '$id_categoria', '$imagenFin');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../paneldecontrol/views/index.php");

}
function editar_producto(){

    global $conexion;
    extract($_POST);


        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);
                
    $consulta="UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', color = '$color', precio = '$precio', cantidad = '$cantidad', categorias = '$categorias', imagen = '$imagenFin' WHERE id = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../paneldecontrol/views/index.php");
}
function eliminar_producto(){

    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM productos WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../paneldecontrol/views/index.php");
}
?>