<?php
include_once 'sqlfunctions/db_connection.php';
new Database();

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
    readfile("clases/global_navbar.php");
    ?>

    <main>
        
         <!--Productos destacados-->
        <h1>PRODUCTOS</h1>
        
        <?php
    include("clases/articles/search_articles.php");
    ?>
        <div class="articles-container" id="articles-container"> 
 
         <?php
    include("clases/articles/computers-articles.php");
    ?>
    </div>
        <script src="js/articles/search_bar.js"></script>
        <script src="js/articles.js"></script>
        <script src="js/articles/more-filters.js"></script>
        <script type="module" src="js/index.js"></script>
        
    </main>


    <?php
    readfile("clases/global_footer.php");
    ?>
</body>

</html>