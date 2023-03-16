<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="../diseños/ABCproductos.style.css">
    <link rel="stylesheet" href="../diseños/css/datatables.min.css">

</head>

<body>
    <?php
    include "../logica/conexion.php";


    $conexion = new conexion();

    $conn = $conexion->conectar();
    $rs = $conn->query("select * From inventario");

    ?>
    <div class="container">
    <h2 class="text-center mt-5">Inventario</h2>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table id="inventario" class="display table  table-hover table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id Producto</th>
                        <th scope="col">precio compra </th>
                        <th scope="col">precio venta</th>
                        <th scope="col">stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    while ($row = $rs->fetch()) {

                        echo "<tr>";
                        echo "<td col=row class='vertical'>" . $row['id'] . "</td>";
                        echo "<td col=row class='vertical'>" . $row['id_producto'] . "</td>";
                        echo "<td col=row class='vertical'>" . $row['precio_compra'] . "</td>";
                        echo "<td col=row class='vertical'>" . $row['precio_venta'] . "</td>";
                        echo "<td col=row class='vertical'>" . $row['stock'] . "</td>";

                        echo '<td col="row">
                                
                                        <form action="actInventarioPantalla.php" method="post">
                                            <input type="hidden" name="id" value="' . $row['id'] . '">
                                            <input type="hidden" name="accion" value="2">
                                            <div class="d-grid gap-2 col-6 mx-auto mb-1">
                                            <input type="submit" class="btn btn-warning btn-sm" value="Cambio">
                                            </div>
                                        </form>
                                
                            </td>';
                        echo "</tr>";
                    }

                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id Product</th>
                        <th scope="col">Precio Compra</th>
                        <th scope="col">Precio venta </th>
                        <th scope="col">Stock</th>

                        <th scope="col">Acciones</th>
                    </tr>
                </tfoot>
                        
            </table>


            <div class="container ">
                <div class="row">
                    <div class="col text-center">
                        <a href="admin.php" class="btn btn-outline-primary">Regresar</a>
                        <a class="btn btn-outline-primary" href="inventarioPantalla.php">Alta</a>

                    </div>
                </div>
            </div>
        </div>
        <script src="../diseños/js/bootstrap.min.js"></script>
    <script src="../diseños/js/datatables.min.js"></script>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 1000);
    </script>
    <script>
        $(document).ready(function() {
            $('#inventario').DataTable({
                scrollY: '320px',
                scrollCollapse: true,
                paging: false,
            });
        });
    </script>

</body>

</html>