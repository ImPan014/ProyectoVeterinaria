<?php

include 'conexion.php';

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

    session_start();


    $conexion = new conexion();

    $conn = $conexion->conectar();
    $query = "SELECT * FROM usuario ";
    $email = "'".$_POST['email']."'";
    $password = "'".$_POST['password']."'";

    $cols = $conn->query("SELECT * FROM usuario WHERE email = " . $email . ' AND password = '. $password);
    $rs = $cols->fetch();


    if($rs['id_rol']){
        $_SESSION['id'] = $rs['id'];
        $_SESSION['email'] = $rs['email'];
        $_SESSION['Activa'] = 1;
        $_SESSION['id_rol'] = $rs['id_rol'];
        header('Location: ../index.php');
    }else{
        session_destroy();
        header('Location: ../inicioSesion.php?error=1');
        exit();
    }
    ?>
</body>

</html>