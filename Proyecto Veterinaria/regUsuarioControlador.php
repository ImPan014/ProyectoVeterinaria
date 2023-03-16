<?php

include 'logica/conexion.php';

if (isset($_POST["nombre"]) || isset($_POST["apellido_paterno"]) || isset($_POST["apellido_materno"]) || isset($_POST["sexo"]) || isset($_POST["telefono"]) || isset($_POST["password"])) {

    header('location: registroUsuario.php?incom=1');
}

$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];

$password = $_POST["password"];

$conexion = new conexion();
try {
    $conn = $conexion->conectar();

    $email = $_POST["email"];

    $query = "SELECT email from usuario WHERE email = '" . $_POST["email"] . "';";
    $rs = $conn->prepare($query);
    $rs->execute();
    $resultado  = $rs->fetch();
    if (isset($resultado['email'])) {

        header('location: registroUsuario.php?error=1');
    } else {
        
    $query = "SELECT count(*) from usuario";


    $rs = $conn->prepare($query);

    $rs->execute();

    $resultado  = $rs->fetch();

    $id_usuario = $resultado["count(*)"] + 1;

    var_dump($id_usuario);

    //INSERT USUARIO
    $query = "INSERT INTO usuario (id,email,password,id_rol) values (" . $id_usuario . ",'" . $email . "' , '" . $password . "', 1)";

    $rs = $conn->prepare($query);

    $rs->execute();
    //INSERT REGISTRO CLIENTE



    //INSERT USUARIO
    $query = "INSERT INTO cliente (id,nombre,apellido_paterno,apellido_materno,sexo,telefono,id_usuario) values (" . $id_usuario . ",'" . $nombre . "','" . $apellido_paterno . "','" . $apellido_materno . "','" . $sexo . "'," . $telefono . "," . $id_usuario . ")";

    $rs = $conn->prepare($query);

    $rs->execute();

    header('Location: inicioSesion.php');
    }
} catch (\Throwable $th) {
    echo $th;
}
