<?php
include_once 'sqlfunctions/db_connection.class.php';
$sql = "SELECT productos.*, categoria.nombre as nombre_categoria
FROM productos
INNER JOIN categoria ON productos.id_categoria = categoria.id";
$productos = mysqli_query($conexion, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link Css Navbar-->
    <link href="css/navbar.css" type="text/css" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="css/global_footer.css" type="text/css" rel="stylesheet">
    <link href="css/articles/computers-articles.css" type="text/css" rel="stylesheet">
    <!--Link Css BoxIcons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--Links de la font "Gabarito"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <!--Fin Links de la font "Gabarito"-->
    <title>Inicio</title>
</head>

<body>
    <?php
    readfile("includes/global_navbar.php");
    ?>

    <main>
    <div class="heroimage-contenedor">
            <div class="heroimage"></div>
        </div>
        
        
         <!--Productos destacados-->
        <h1>PRODUCTOS</h1>
        
        <?php
    include("includes/articles/search_articles.php");
    ?>
        <div class="articles-container" id="articles-container"> 
 
        <div class="list">
<?php
    if ($productos->num_rows > 0) {
        foreach ($productos as $key => $row) {
?> 

     <div class="card">
        <div class="card-img"><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']); ?>" ></td</div>
        <div class="card-title"><?php echo $row["nombre"];?></div>
        <div class="card-subtitle"><?php echo $row["descripcion"];?></div>
        <hr class="card-divider">
        <div class="card-footer">
            <div class="card-price"><span>$</span><?php echo $row["precio"];?></div>
            <button class="card-btn">
              <i class='bx bx-plus-medical'></i>
            </button>
        </div>
    </div>

    <?php
        }
    }
    ?>  
    
</div>
   <div>
       <ul class="listPage">
       <li>1</li>
       </ul>
   </div>
    </div>
        <script src="js/articles/search_bar.js"></script>
        <script src="js/articles.js"></script>
        <script src="js/articles/more-filters.js"></script>
        <script type="module" src="js/index.js"></script>
        
    </main>


    <?php
    readfile("includes/global_footer.php");
    ?>
</body>

</html>