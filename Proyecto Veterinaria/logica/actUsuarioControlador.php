<?php

include 'conexion.php';

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conexion = new conexion();
    $conn = $conexion->conectar();
    $id = $_POST['id'];
    if ($_SESSION['id_rol'] == 1) {
        $nombre = $_POST['nombre'];
        $apellido_materno = $_POST['apellido_materno'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        try {
            $cols = $conn->query("UPDATE cliente SET nombre='$nombre',apellido_materno='$apellido_materno',apellido_paterno='$apellido_paterno',sexo='$sexo',telefono=$telefono WHERE id = " . $id);
            echo "Se Modificado Correctamente";
            header('location: ../user.php');
        } catch (Exception $error) {
            echo "Error 404" . $error;
        }
    } else if ($_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) {
        $nombre = $_POST['nombre'];
        $apellido_materno = $_POST['apellido_materno'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $rfc = $_POST['rfc'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['estado'];
        try {
            $cols = $conn->query("UPDATE medico SET nombre='$nombre',apellido_materno='$apellido_materno',apellido_paterno='$apellido_paterno',sexo='$sexo',telefono=$telefono,estado='$estado' WHERE id = ". $id);
            echo "Se Modificada Correctamente";
            header('location: ../user.php');
        } catch (Exception $error) {
            echo "Error 404" . $error;
        }
    } else if ($_SESSION['id_rol'] == 3) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $estado_civil = $_POST['estado_civil'];
        try {
            $cols = $conn->query("UPDATE empliados set nombre = '$nombre',telefono=$telefono,fecha_nacimiento='$fecha_nacimiento',estado_civil='$estado_civil' WHERE id = ".$id);
            echo "Se modificado Correctamente";
        } catch (Exception $error) {
            echo "error 404" . $error;
        }
    }
    ?>
</body>

</html>