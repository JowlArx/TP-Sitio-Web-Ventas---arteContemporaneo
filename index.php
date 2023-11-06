<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link Css Navbar-->
    <link href="css/navbar.css" type="text/css" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="css/slider.css" type="text/css" rel="stylesheet">
    <link href="css/index_novedades.css" type="text/css" rel="stylesheet">
    <link href="css/global_footer.css" type="text/css" rel="stylesheet">
    <!--Link Css BoxIcons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--Swipper Css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

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
        
         <!--Swipper Js-->
        

         <!--Productos destacados-->
         <h1>Destacados</h1>
         <div class="novedades">
        <?php
            include("includes/index_novedades.class.php");
            ?>
        </div>

        <!--Añadidos Recientemente-->
        <h1>Añadidos Recientemente</h1>
        <div class="novedades">
        <?php
            include("includes/index_novedades.class.php");
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script type="module" src="js/index.js"></script>
        
    </main>


    <?php
    readfile("includes/global_footer.php");
    ?>
</body>

</html>