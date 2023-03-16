<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="../diseños/AltaProducto.style.css">
    <title>Actualización producto</title>
</head>

<body class="container">
<?php

include '../logica/conexion.php';




$conexion = new conexion();

$conn = $conexion->conectar();
$rs = $conn->query("select id,nombre From producto");


?>
    <h1 style="text-align:center;">Inventario</h1>
    <form method="post" action="actInventario.php">

        <input type="hidden" name="id" value=" <?php echo $_POST["id"]; ?>">
        <div class="form-group">
            <label for="formGroupExampleInput2">ID Producto</label>
            <!--<input type="number" class="form-control" id="formGroupExampleInput2" placeholder="ID Producto" name="id_producto">-->
            <select name="id_producto" id="formGroupExampleInput2">
                <?php
                while ($row = $rs->fetch()) {
                    echo ""
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php ;
                }
                ?>
            </select>
        </div>
        <?php
            $rs = $conn->query("select id_producto, precio_compra, precio_venta, stock From inventario where id = " . $_POST['id']);

            $rows = $rs->fetch();

        ?>
        <div class="form-group">
            <label for="formGroupExampleInput2">Precio compra</label>
            <input value="<?php echo $rows['precio_compra']; ?>" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Precio compra" name="precio_compra">
        </div>


        <div class="form-group">
            <label for="formGroupExampleInput2">Precio venta</label>
            <input value="<?php echo $rows['precio_venta']; ?>" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Precio venta" name="precio_venta">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Stock</label>
            <input value="<?php echo $rows['stock']; ?>" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Stock" name="stock">
        </div>

        <div class="col text-center">
            <input type="submit" class="btn btn-success mt-4" name=" " value="Realizar">
            
        </div>



    </form>
    <script>
            setTimeout(() => {
                document.getElementById("alert").remove();
            }, 0);
        </script>
        
</body>

</html>

</html>