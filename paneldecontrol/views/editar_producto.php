<?php

$id = $_GET['id'];
require_once ("../../sqlfunctions/db_connection.class.php");
$consulta = "SELECT productos.*, categoria.nombre as nombre_categoria
FROM productos
INNER JOIN categoria ON productos.id_categoria = categoria.id
WHERE productos.id = $id";
$resultado = mysqli_query($conexion, $consulta);
$productos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../sqlfunctions/db_connection.class.php' ?>
<?php require '../header.class.php' ?>
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../sqlfunctions/functions.php" method="POST"  enctype="multipart/form-data" >

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="nombre" class="form-label">Nombre *</label>
<input type="text"  id="nombre" name="nombre" value="<?php echo $productos ['nombre']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="descripcion" class="form-label">Descripcion *</label>
<input type="text"  id="descripcion" name="descripcion" value="<?php echo $productos ['descripcion']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="color" class="form-label">Color *</label>
<input type="text"  id="color" name="color" value="<?php echo $productos ['color']; ?>"  class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="precio" class="form-label">Precio *</label>
<input type="number"  id="precio" name="precio"  value="<?php echo $productos ['precio']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="cantidad" class="form-label">Cantidad *</label>
<input type="number"  id="cantidad" name="cantidad"  value="<?php echo $productos ['cantidad']; ?>" class="form-control" required>
</div>
</div>

<div class="row">
    <div class="col-sm-12">
    <div class="mb-3">
<label for="categorias" class="form-label">Categorias *</label>
<select name="id_categoria" id="id_categoria" class="form-control" required>
    <?php 
    $sql = "SELECT * FROM categoria";
    $categorias = mysqli_query($conexion, $sql);

    if ($categorias->num_rows > 0) {
        foreach ($categorias as $key => $row) {
            $selected = ($row['id'] == $id_categoria) ? "selected" : "";
            ?>
            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['nombre']; ?></option>
            <?php
        }
    }
    ?>
</select>
    </div>   
</div>
</div>
<div class="mb-3">
<div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <input type="file" class="form-control-file"  name="foto" id="foto" required>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="editar_producto">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<button type="submit" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../footer.class.php' ?>
</html>