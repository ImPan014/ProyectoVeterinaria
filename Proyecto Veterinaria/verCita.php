<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="diseños/ABCproductos.style.css">
    <link rel="stylesheet" href="diseños/css/datatables.min.css">
    <title>Document</title>
</head>

<?php

include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

$rsCita = $conn->query("select * From cita where id = " . $_POST['id']);
$rowsCita = $rsCita->fetch();
$rsMedico = $conn->query("select * From medico where id = " . $rowsCita['id_medico']);
$rowsMedico = $rsMedico->fetch();

$rsCliente = $conn->query("select * From cliente where id = " . $rowsCita['id_cliente']);
$rowsCliente = $rsCliente->fetch();

?>

<body>
    <div class="container mt-5">
        <div class="card mt-5">
            <h5 class="card-header">Detalles de la cita</h5>
            <div class="card-body">
                <h5 class="card-title">Nombre: <?php echo $rowsCliente['nombre'] ." ". $rowsCliente['apellido_paterno'] . " ". $rowsCliente['apellido_materno'] ; ?></h5>
                <p class="card-text">
                <b>Datos del cliente</b> <br>
                sexo: <?php echo $rowsCliente['sexo']; ?> <br>
                contacto: <?php echo $rowsCliente['telefono']; ?> <br>
                <b>Datos de la cita</b> <br>
                Fecha de inicio: <?php echo $rowsCita['fecha_incio']; ?> <br>
                Fecha de final: <?php echo $rowsCita['fecha_fin']; ?> <br>
                Nota: <?php echo $rowsCita['nota']; ?> <br>
            
            </p>
                <a href="citasDia.php" class="btn btn-primary">Regresar</a>
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