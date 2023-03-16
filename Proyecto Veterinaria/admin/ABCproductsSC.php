<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="../diseños/ABCproductos.style.css">
    <link rel="stylesheet" href="../diseños/css/datatables.min.css">
    <link rel="shortcut icon" href="../assets/bone.png">
    <title>ABC Productos</title>
</head>

<body>
    <?php

    include '../logica/conexion.php';




    $conexion = new conexion();

    $conn = $conexion->conectar();
    $rs = $conn->query("select * From producto");


    ?>
    <div class="container mt-4">
        <h2 class="centrado">ABC Productos</h2>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <table id="inventario" class="display table  table-hover table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $estadoValor = "";
                        $color = "";

                        while ($row = $rs->fetch()) {
                            if ($row['estado'] == 1) {
                                $estadoValor = "Alta";
                                $color = "green";
                            } else {
                                $estadoValor = "Baja";
                                $color = "red";
                            }
                            echo "<tr>";
                            echo "<td col=row class='vertical'>" . $row['id'] . "</td>";
                            echo "<td col=row class='vertical'>" . $row['nombre'] . "</td>";
                            echo "<td col=row class='vertical' style='Color:".$color.";'>" . $estadoValor . "</td>";
                            echo "<td col=row class='vertical'>" . $row['descripcion'] . "</td>";
                            echo '<td col="row">
                            
                                    <form action="UpdateProducto.php" method="post">
                                        <input type="hidden" name="id" value="' . $row['id'] . '">
                                        <input type="hidden" name="accion" value="2">
                                        <div class="d-grid gap-2 col-6 mx-auto mb-1">
                                        <input type="submit" class="btn btn-warning btn-sm" value="Cambio">
                                        </div>
                                    </form>
                                    <form action="../logica/productoControlador.php" method="post">
                                        <input type="hidden" name="id" value="' . $row['id'] . '">
                                        <input type="hidden" name="accion" value="3">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                        <input type="submit" class="btn btn-danger btn-sm" value="Baja">
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
                            <th scope="col">Nombre</th>
                            <th scope="col">estado</th>
                            <th scope="col">descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <h3 class="centrado">Acciones</h3>
                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <a class="btn btn-success" href="AltaProducto.php">Alta</a>
                    <a class="btn btn-primary" href="../admin/admin.php">Inicio</a>
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