<!DOCTYPE html>
<html>

<head>

    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
        <link rel="stylesheet" href="../diseños/ABCproductos.style.css">
        <link rel="stylesheet" href="../diseños/css/datatables.min.css">

    </head>
</head>

<?php

include '../logica/conexion.php';




$conexion = new conexion();

$conn = $conexion->conectar();
$rs = $conn->query("select id,nombre From producto");


?>

<body class="container">
    <h1 style="text-align:center;">Alta inventario</h1>
    <form method="post" action="inventarioControlador.php">

        <!--<div class="form-group">
            <label for="InputName">ID</label>
            <input type="number" class="form-control" id="InputName" placeholder="ID" name="id">
        </div>
        -->
        <div class="form-group">
            <label for="formGroupExampleInput2">ID Producto</label>
            <!--<input type="number" class="form-control" id="formGroupExampleInput2" placeholder="ID Producto" name="id_producto">-->
            <select name="id_producto" id="formGroupExampleInput2">
                <?php
                while ($row = $rs->fetch()) {
                    echo ""
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php
                ;
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Precio compra</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Precio compra" name="precio_compra">
        </div>


        <div class="form-group">
            <label for="formGroupExampleInput2">Precio venta</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Precio venta" name="precio_venta">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Stock</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Stock" name="stock">
        </div>

        <div class="col text-center">
            <input type="submit" class="btn btn-success mt-4" name=" " value="Realizar">
        </div>



    </form>
</body>

</html>

</html>