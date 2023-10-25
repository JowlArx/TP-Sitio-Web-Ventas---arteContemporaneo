<?php
include_once ('sqlfunctions/db_connection.class.php'); 
$db = new DB();
include_once( "sqlfunctions/marca.php" );
$marca = new Marca();
$listado = $db->getRows(array(),'componentes');
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
       <button class="btn btn-open">Cargar</button>
           <div class="search-container">
               <i class='bx bx-search'></i>
               <input class="search" type="text" id="mySearch abrirModal" placeholder="Buscar">
           </div>
            
       </div>
       <section class="modal hidden">
        <div class="modal-container">
  <div class="flex">
    <button class="btn-close">⨉</button>
  </div>
  <div>
    <h3>Cargar Componente</h3>
    <form>
        <label>Marca</label>
        <input class="marcaInput" placeholder="Marca del componente">
        <label>Modelo</label>
        <input class="modeloInput" placeholder="Modelo del componente">
        <label>Precio</label>
        <input class="precioInput" placeholder="Precio del componente">
        <label>Stock</label>
        <select name="stockSelect">
        <option value="true">Si</option>
        <option value="false">No</option>
        </select>
        <label class="drop-area">
        <input class="imagenInput" type="file" hidden>
        <div class="img-view">
            <img src="">
            <p>Arrastre o haz clic aqui para subir una imagen</p>
        </div>
        </label>
        <label>Tabla de Espicificaciones</label>


    </form>
  </div>
  <button class="btn">Subir</button>
</div>
</section>
<div class="overlay hidden"></div>


        <table id="marcaTable" data-table-name="componentes">
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
    <script src="js/subir_componente.js"></script>


</body>