<?php
    include "../logica/conexion.php";
    
    $id_producto=$_POST["id_producto"];
    $precio_compra=$_POST["precio_compra"];
    $precio_venta=$_POST["precio_venta"];
    $stock=$_POST["stock"];

    $conexion= new conexion();
    try{
        $conn = $conexion->conectar();
          //insertar 
            $query= "INSERT INTO inventario (id_producto,precio_compra,precio_venta,stock) values (".$id_producto.", ".$precio_compra.",".$precio_venta. ", ".$stock." )";
    
            $rs = $conn->prepare($query);

            $rs->execute();

            header('Location: Inventario.php');

    }catch(\Throwable $th) {
            echo $th;
    }

    
    




?>