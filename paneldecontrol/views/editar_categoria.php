<?php
$id = $_GET['id'];

require_once("../../sqlfunctions/db_connection.class.php");

$consulta = "SELECT * FROM `categoria`";

$resultado = mysqli_query($conexion, $consulta);
$categorias = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<?php require '../../sqlfunctions/db_connection.class.php' ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="../../css/sidebar.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <?php require '../sidebar.class.php'; ?>
                </div>
                <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                    <div id="col py-3">
                        <div class="col-sm-6 offset-3 mt-5">
                            <form action="../../sqlfunctions/functions.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre *</label>
                                            <input type="text" id="nombre" name="nombre" value="<?php echo $categorias['nombre']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="accion" value="editar_categoria">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require '../footer.class.php' ?>

</html>
