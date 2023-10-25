<?php
include_once ('sqlfunctions/db_connection.class.php'); 
$db = new DB();
include_once( "sqlfunctions/marca.php" );
$marca = new Marca();
$listado = $db->getRows(array(),'marca');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link Css Subir Marca-->
    <link href="css/subir_marca.css" type="text/css" rel="stylesheet">
    <!--Css BoxIcons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--Css DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <!--Font "Gabarito"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <!--Fin Font "Gabarito"-->
    <title>Inicio</title>
</head>

<body>
    <div class = "container">
       <div class="tableHeaderContainer">
           <form class="insertMarca" id="marcaForm" action="" method="POST">
                   <input class="inputMarca" type="text" name="nombre_marca_insert" placeholder="Nombre de la marca" autofocus>
               <input class="sumbitMarca" type="submit" name="" value="+">
           </form>
           <div class="search-container">
               <i class='bx bx-search'></i>
               <button class="search" type="text" id="mySearch" placeholder="Buscar">
           </div>
            
       </div>
            
        <table id="marcaTable" data-table-name="marca">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="userData">
               <?php
                    foreach ($listado as $row) {
                ?>
                <tr id="<?php echo $row["id"]; ?>">
                <td><?php echo $row["id"]; ?></td>
                <td>
                     <span class="editSpan nombre"><?php echo $row['nombre']; ?></span>
                     <input class="form-control editInput nombre" type="text" name="nombre" value="<?php echo $row['nombre']; ?>" style="display: none;">
                </td>
                <td>
                
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
        
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!--DataTables-->
    <!--subir_marca.js-->
    <script src="js/subir_marca.js"></script>

</body>