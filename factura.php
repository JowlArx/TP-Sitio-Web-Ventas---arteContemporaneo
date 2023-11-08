
<?php
ob_start();
$cliente = "Ejemplo";
$remitente = "Arteraneo";
$web = "https://arteraneo.com/";
$mensajePie = "Gracias por su compra";
$numero = 1;
$descuento = 0;
$ivaPorcentaje = 27;
$id = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

require_once("sqlfunctions/db_connection.class.php");

$consulta = "SELECT productos.*, categoria.nombre as nombre_categoria
             FROM productos
             INNER JOIN categoria ON productos.id_categoria = categoria.id
             WHERE productos.id = $id";

$resultado = mysqli_query($conexion, $consulta);
$productos = mysqli_fetch_assoc($resultado);
$fecha = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Factura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" id="content">
    <div class="row">
        <div class="col-10">
            <h1>Factura</h1>
        </div>
        <div class="col-2">
            <img class="img img-fluid" src="./img/logo_pa_la_pagina.png" alt="Logotipo" style="background-color: #000000">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-10">
            <h1 class="h6"><?php echo $remitente ?></h1>
            <h1 class="h6"><?php echo $web ?></h1>
        </div>
        <div class="col-2 text-center">
            <strong>Fecha</strong>
            <br>
            <?php echo $fecha ?>
            <br>
        </div>
    </div>
    <hr>
    <div class="row text-center" style="margin-bottom: 2rem;">
        <div class="col-md-6">
            <h1 class="h2">Cliente</h1>
            <strong><?php echo $cliente ?></strong>
        </div>
        <div class="col-md-6">
            <h1 class="h2">Remitente</h1>
            <strong><?php echo $remitente ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $subtotal = 0;
                    $totalProducto = $cantidad * $productos["precio"];
                    $subtotal += $totalProducto;
                    ?>
                    <tr>
                        <td><?php echo $productos["nombre"] ?></td>
                        <td><?php echo number_format($cantidad) ?></td>
                        <td>$<?php echo number_format($productos["precio"], 2) ?></td>
                        <td>$<?php echo number_format($totalProducto, 2) ?></td>
                    </tr>
                <?php 
                $subtotalConDescuento = $subtotal - $descuento;
                $iva = $subtotalConDescuento * ($ivaPorcentaje / 100);
                $total = $subtotalConDescuento + $iva;
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Subtotal</td>
                    <td>$<?php echo number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">IVA</td>
                    <td>$<?php echo number_format($iva, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">
                        <h4>Total</h4></td>
                    <td>
                        <h4>$<?php echo number_format($total, 2) ?></h4>
                    </td>
                </tr>
                </tfoot>
            </table>
            <div id="editor"></div>
            <button id="cmd">Generar PDF</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p class="h5"><?php echo $mensajePie ?></p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-fpS9hQXpJxQ5+toct39l8l4G6sFImOsPQWCEJrOq6FJTham/8Xw+OgST6UWqU3t4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script>
    $('#cmd').click(function () {
        const doc = new jsPDF('p', 'pt', 'a4');
    const content = document.getElementById('content');
    doc.addHTML(document.body, { scale: 2 }, function() {
    doc.save('*.pdf', { dpi: 300 });
});
    });

    </script>
</body>
</html>
