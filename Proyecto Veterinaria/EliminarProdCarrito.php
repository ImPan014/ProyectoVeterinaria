<?php

session_start();

include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

if (isset($_SESSION['Activa'])) {

    try {
        $id_producto = $_POST['id_producto'];
        $id_usuario = $_SESSION['id'];
    
        $query = "DELETE FROM carrito WHERE id_producto = $id_producto AND id_usuario = $id_usuario ;";
    
        $consulta = $conn->prepare($query);
    
        $consulta->execute();
    
        header('Location: carrito.php');
    } catch (\Throwable $th) {
        header('Location: carrito.php?errorEliminar=1');
    }
}
