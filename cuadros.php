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
    <!--Link Css BoxIcons-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

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

     <div class = "card">
    <img src="data:image;base64,<?php echo base64_encode($row['imagen']); ?>" alt="">
    <div class="card-content">
      <h2>
        <?php echo $row["nombre"];?>
      </h2>
      <p>
        <?php echo $row["descripcion"];?>
      </p>
      <a href="#" class="button">
        Ver mas 
        <span class="material-symbols-outlined">
          arrow_right_alt
        </span>
      </a>
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