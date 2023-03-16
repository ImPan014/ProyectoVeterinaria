<?php

session_start();

if(isset($_POST['accion'])){
    if($_POST['accion'] == 1){
        if($_POST['fecha_incio'] == "" || $_POST['fecha_fin'] == ""){
            header('Location: calendario.php?error=1');
        }
    }
}

class CalendarioControlador
{

    public function guardar()
    {


        if ($_POST['user'] == 1) {
            include 'logica/conexion.php';

            $conexion = new conexion();

            $conn = $conexion->conectar();

            $query = $conn->query("select * from medico where estado = 1 LIMIT 1");

            $rs = $query->fetch();

            $id_cliente = $_POST['id_cliente'];
            $id_medico = $rs['id'];
            $fecha_incio = $_POST['fecha_incio'];
            $fecha_fin = $_POST['fecha_fin'];
            $nota = $_POST['nota'];
            $query = $conn->prepare("INSERT INTO cita (id_cliente, id_medico, fecha_incio, fecha_fin, nota) VALUES ($id_cliente,$id_medico, '$fecha_incio', '$fecha_fin', '$nota')");
            $query->execute();
        } else if ($_POST['user'] == 2) {
            include 'logica/conexion.php';

            $conexion = new conexion();

            $conn = $conexion->conectar();

            $id_cliente = $_POST['id_cliente'];
            $id_medico = $_POST['id_medico'];
            $fecha_incio = $_POST['fecha_incio'];
            $fecha_fin = $_POST['fecha_fin'];
            $nota = $_POST['nota'];
            $query = $conn->prepare("INSERT INTO cita (id_cliente, id_medico, fecha_incio, fecha_fin, nota) VALUES ($id_cliente,$id_medico, '$fecha_incio', '$fecha_fin', '$nota')");
            $query->execute();
        }
        if($_SESSION['id_rol'] == 1){
            header('Location: tablacalendario.php');
        }else{
            header('Location: user.php');
        }
    }
    public function actualizar()
    {
        $calendario = new cita();
        $calendario->nombre = $_POST['nombre'];
        $calendario->id = $_POST['id'];


        $calendario->update();
    }
    public function drop()
    {
        include 'logica/conexion.php';
        $conexion = new conexion();
        $conn = $conexion->conectar();
        try {
            $query = $conn->prepare("DELETE FROM cita WHERE id =" . $_POST['id']);
            $query->execute();
            header('Location: user.php');
        } catch (Exception $error) {
            echo "error de Conexion" . $error;
        }
    }
}

$calendario = new CalendarioControlador();

if ($_POST['accion'] == 1) {
    $calendario->guardar();
} else if ($_POST['accion'] == 2) {
    $calendario->actualizar();
} else  if ($_POST['accion'] == 3) {
    $calendario->drop();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Diseño/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class='row'>
            <div class='col-4'></div>
            <div class='d-grid gap-2 col-4'>
                <a href='calendario.php' class='btn btn-success mb-3 mt-3'>Regresar</a>
            </div>
            <div class='col-4'></div>
        </div>
    </div>

</body>

</html>