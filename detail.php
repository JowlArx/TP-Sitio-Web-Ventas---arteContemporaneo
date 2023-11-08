  <?php
$id = $_GET['id'];

require_once("sqlfunctions/db_connection.class.php");

$consulta = "SELECT productos.*, categoria.nombre as nombre_categoria
             FROM productos
             INNER JOIN categoria ON productos.id_categoria = categoria.id
             WHERE productos.id = $id";

$resultado = mysqli_query($conexion, $consulta);
$productos = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link Css Navbar-->
    <link href="css/navbar.css" type="text/css" rel="stylesheet">
    <link href="css/detail.css" type="text/css" rel="stylesheet">
    <link href="css/global_footer.css" type="text/css" rel="stylesheet">
    <!--Link Css MaterialSymbols-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!--Links de la font "Gabarito"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.7.0/csshake.min.css">
    <link rel="stylesheet" type="text/css" href="csshake-slow.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <!--Fin Links de la font "Gabarito"-->
    <title></title>
</head>
<body>
    <div class="container">
       <div class="title">Detalles de <?php echo $productos["nombre"];?></div>
        <div class="detail">
            <div class="image">
                <img src="data:image;base64,<?php echo base64_encode($productos['imagen']); ?>" alt="">
            </div>
            <div class="content">
                <h1 class="name"><?php echo $productos["nombre"];?></h1>
                <h2 class="artista"><?php echo $productos["artista"];?></h2>
                <div class="price">$<?php echo $productos["precio"];?></div>
                <div class="buttons">
    <form action="factura.php" method="post">
        <input type="hidden" name="id_producto" value="<?php echo $productos['id']; ?>">
        <input type="number" name="cantidad" max="<?php echo $productos['cantidad']; ?>">
        <button type="submit">Comprar
            <span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
  </svg>
               </span>
        </button>
    </form>
</div>
                
                <div class="description"><?php echo $productos["descripcion"];?></div>
            </div>
        </div>
    </div>
</body>
</html>