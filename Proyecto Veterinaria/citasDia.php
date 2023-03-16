<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="diseños/ABCproductos.style.css">
    <link rel="stylesheet" href="diseños/css/datatables.min.css">
    <link rel="shortcut icon" href="assets/bone.png">
    <title>Citas</title>
</head>

<body>
    <?php

    session_start();

    include 'logica/conexion.php';




    $conexion = new conexion();

    $conn = $conexion->conectar();

    $rs = $conn->query("select * From cita");

    ?>
    <div class="container mt-4">
        <h2 class="centrado">Citas del dia</h2>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <table id="inventario" class="display table  table-hover table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre cliente</th>
                            <th scope="col">Nombre Medico</th>
                            <th scope="col">Inicio fecha y hora</th>
                            <th scope="col">Fin fecha y hora</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Acción</th>
                            <!--<th scope="col">Acciones</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $estadoValor = "";
                        $color = "";

                        while ($row = $rs->fetch()) {

                            

                            $rsCita = $conn->query("select * From cita where id = " . $row['id']);
                            $rowsCita = $rsCita->fetch();
                            $rsMedico = $conn->query("select * From medico where id = " . $rowsCita['id_medico']);
                            $rowsMedico = $rsMedico->fetch();

                            $rsCliente = $conn->query("select * From cliente where id = " . $rowsCita['id_cliente']);
                            $rowsCliente = $rsCliente->fetch();

                            $fecha = substr($rowsCita['fecha_incio'], 0, -9);

                            if(date('Y-m-d') == $fecha){
                            echo "<tr>";
                            echo "<td col=row class='vertical'>" . $rowsCita['id'] . "</td>";
                            echo "<td col=row class='vertical'>" . $rowsMedico['nombre'] . "</td>";
                            echo "<td col=row class='vertical'>" . $rowsCliente['nombre'] . "</td>";
                            echo "<td col=row class='vertical'>" . $rowsCita['fecha_incio'] . "</td>";
                            echo "<td col=row class='vertical'>" . $rowsCita['fecha_fin'] . "</td>";
                            echo "<td col=row class='vertical'>" . $rowsCita['nota'] . "</td>";
                            echo '<td col="row">
                                    <form action="verCita.php" method="post">
                                        <input type="hidden" name="id" value="' . $rowsCita['id'] . '">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                        <input type="submit" class="btn btn-warning btn-sm" value="Detalles">
                                        </div>
                                    </form>
                            
                        </td>';
                            echo "</tr>";
                            }
                        }

                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre cliente</th>
                            <th scope="col">Nombre Medico</th>
                            <th scope="col">Inicio fecha y hora</th>
                            <th scope="col">Fin fecha y hora</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Acción</th>
                            <!--<th scope="col">Acciones</th>-->
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <h3 class="centrado">Acciones</h3>
                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <a class="btn btn-primary" href="user.php">Inicio</a>
                </div>
            </div>
        </div>

    </div>
    <script src="diseños/js/bootstrap.min.js"></script>
    <script src="diseños/js/datatables.min.js"></script>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 0);
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