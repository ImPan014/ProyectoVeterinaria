<?php

session_start();

include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

if (isset($_SESSION['Activa'])) {
    $id_producto = $_POST['id_producto'];
    $id_usuario = $_SESSION['id'];
    $cantidad;
    $agregar = false;

    //Consultamos si ya tiene un producto simial en su carrito

    $query = "SELECT * FROM carrito WHERE id_producto =  $id_producto AND id_usuario = $id_usuario";
    

    try {
        $rs = $conn->query($query);
        $col = $rs->fetch();
        if ($col['cantidad']) {
            
            $cantidad = $col['cantidad'] + 1;
            $query = "UPDATE carrito SET cantidad = $cantidad WHERE id_producto =  $id_producto AND id_usuario = $id_usuario";
            $rs = $conn->query($query);
            $agregar = true;
            header("Location: carrito.php");
        }
        if (!$agregar) {
            $query = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES ($id_usuario, $id_producto, 1)";
            if ($rs = $conn->query($query)) {
                header("Location: carrito.php");
            } else {
                header("Location: catalogo.php?agregarError=1");
            }
        }
    } catch (\Throwable $th) {
        header("Location: catalogo.php?agregarError=1");
    }
}
