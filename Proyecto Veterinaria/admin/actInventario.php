<?php
    include "../logica/conexion.php";
    $id=$_POST["id"];
    $id_producto=$_POST["id_producto"];
    $precio_compra=$_POST["precio_compra"];
    $precio_venta=$_POST["precio_venta"];
    $stock=$_POST["stock"];

    $conexion= new conexion();
    try{
        $conn = $conexion->conectar();
          //insertar 
            $query= "UPDATE inventario set id_producto = $id_producto , precio_compra = $precio_compra , precio_venta = $precio_venta , stock = $stock  where id = $id";
    
            $rs = $conn->prepare($query);

            $rs->execute();
          
        header('location: inventario.php');
    }catch(\Throwable $th) {
            echo $th;
    }