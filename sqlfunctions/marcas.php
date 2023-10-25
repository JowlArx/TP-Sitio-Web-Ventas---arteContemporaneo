<?php 
 
// Load and initialize database class 
require_once 'db_connection.class.php'; 
$db = new DB(); 
 
if(($_POST['action'] == 'edit') && !empty($_POST['id'])){ 
    // Update data 
    $userData = array( 
        'nombre' => $_POST['nombre']
    ); 
    $condition = array( 
        'id' => $_POST['id'] 
    );
    $tabla = $_POST['table'];
    $update = $db->update($userData, $condition, $tabla); 
 
    if($update){ 
        $response = array( 
            'status' => 1, 
            'msg' => 'Member data has been updated successfully.', 
            'data' => $userData 
        ); 
    }else{ 
        $response = array( 
            'status' => 0, 
            'msg' => 'Something went wrong!' 
        ); 
    } 
     
    echo json_encode($response); 
    exit(); 
}elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){ 
    // Delete data 
    $condition = array('id' => $_POST['id']);
    $tabla = $_POST['table'];
    $delete = $db->delete($condition, $tabla); 
 
    if($delete){ 
        $returnData = array( 
            'status' => 1, 
            'msg' => 'Member data has been deleted successfully.' 
        ); 
    }else{ 
        $returnData = array( 
            'status' => 0, 
            'msg' => 'Something went wrong!' 
        ); 
    } 
     
    echo json_encode($returnData); 
    exit(); 
}elseif(($_POST['action'] == 'insert')){
    $nombre_marca = $_POST['nombre_marca_insert'];

    if (!empty($nombre_marca)) {
         $tabla = $_POST['table'];
        $insertedID = $db->insert(['nombre' => $nombre_marca], $tabla);
        $nuevoID = $insertedID;
       
        
        $listado = $db->getRows(array(), $tabla);

        if ($listado) {
            $insertData = array(
                'status' => 1, 
                'msg' => 'Inserción exitosa', 
                'data' => $listado
            );
        }else {
            $insertData = array(
                'status' => 0, 
                'msg' => 'Inserción fallida'
            );
        }
        
        echo json_encode($insertData, JSON_UNESCAPED_UNICODE); 
        exit(); 
    } 
    
}
 
?>