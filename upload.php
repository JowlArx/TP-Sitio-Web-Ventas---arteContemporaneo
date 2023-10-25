<?php
require_once 'sqlfunctions/db_connection.php';

if(isset($_POST["submit"])){
    $name = $_POST["productname"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    
    if($_FILES["image"]["error"] === 4){
        echo
            "<script>alert('La imagen no existe');</script>";
    }
    else{
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];
        
        var_dump($fileName);
var_dump($imageExtension);
        
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo
            "<script>alert('Formato invalido');</script>";
        }
        else if($fileSize > 1000000){
            echo
            "<script>alert('El tamaño de la imagen es muy grande');</script>";
        }
        else{
            $newImageName = uniqid();
            $newImageName .= "." . $imageExtension;
            
            move_uploaded_file($tmpName, "img/" . $newImageName);
            $query = "INSERT INTO `products` (`id`, `name`, `description`, `precio`, `imagen`) VALUES (NULL, '$name', '$description', '$price', '$newImageName')";
            mysqli_query($conn, $query);
            echo
            "<script>alert('Articulo añadido satisfactoramiente');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links de la font "Gabarito"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <!--Fin Links de la font "Gabarito"-->
    <title>Upload</title>
</head>

<body>
  <section id="upload_container">
      <form action="upload.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="text" name="productname" id="productname" placeholder="Nombre del producto" required>
         <input type="text" name="description" id="description" placeholder="Descripcion" required>
        <input type="number" name="price" id="price" placeholder="Precio del producto" required>
        <input type="file" name="image" id= "image" accept=".jpg, .jpeg, .png" value="" required>
        <input type="submit" value="Upload" name="submit">
      </form>
  </section>

</body>

</html>