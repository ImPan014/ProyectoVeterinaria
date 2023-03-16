<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/bone.png">
    <title>Mis citas</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center" style="background-color: blue; color: white; border-radius: 10px;">Lista de Cita</h1>
        <br>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FECHA DE INICIO</th>
                    <th scope="col">FECHA FIN</th>
                    <th scope="col">NOTA</th>
                    <th scope="col">ACCION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'logica/conexion.php';
                $conexion = new conexion();
                $conn = $conexion->conectar();
                $rol = $conn->query("SELECT * FROM cita");
                while ($row = $rol->fetch()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['fecha_incio']; ?></td>
                        <td><?php echo $row['fecha_fin']; ?></td>
                        <td><?php echo $row['nota']; ?></td>
                        <td>
                            <form action="calendariControlador.php" method="post">
                                <input type="hidden" name="id" value=" <?php echo $row['id']; ?> ">
                                <input type="hidden" name="accion" value="3">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Elminar">
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="" class="btn btn-success">Agregar</a>
    </div>



    <script src="../Diseño/js/bootstrap.min.js"></script>
</body>

</html>