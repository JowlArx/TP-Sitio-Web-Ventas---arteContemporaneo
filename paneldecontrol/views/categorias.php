<!DOCTYPE html>
<html lang="en">

<?php
require '../../sqlfunctions/db_connection.class.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="../../css/sidebar.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div id="container">
<div class="container-fluid">
<div class="row flex-nowrap">
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <?php
    require '../sidebar.class.php';
    ?>
   </div>
   <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
   <div id="col py-3">
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <center><h1>Categorias</h1></center>
                    <a href="agregar_categoria.php"><input class="btn btn-primary" type="button" value="Agregar categoria"></a>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `categoria`";
                                $categorias = mysqli_query($conexion, $sql);
                                if ($categorias->num_rows > 0) {
                                    foreach ($categorias as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td>
                                                <a href="editar_categoria.php?id=<?php echo $row['id'] ?>">
                                                    <div>
                                                        Editar
                                                    </div>
                                                </a>
                                                <a href="eliminar_categoria.php?id=<?php echo $row['id'] ?>">
                                                    <div>
                                                        Eliminar
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                ?>
                                    <tr class="text-center">
                                        <td colspan="4">No existe registros</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require '../footer.class.php' ?>

</html>
