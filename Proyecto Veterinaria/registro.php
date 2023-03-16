<?php


include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

$query = "SELECT count(*) FROM venta";
$rs = $conn->query($query);
$row = $rs->fetch();
var_dump($row['count(*)'] + 1);
