<?php

include 'producto.php';

class productoControlador
{

    public function guardar()
    {

        $producto1 = new producto();

        $producto1->id = $_POST['id'];
        $producto1->nombre = $_POST['nombre'];
        $producto1->descripcion = $_POST['descripcion'];
        $producto1->estado = $_POST['estado'];


        $producto1->insert();
    }
    public function actualizar()
    {
        $producto1 = new producto();

        $producto1->nombre = $_POST['nombre'];
        $producto1->descripcion = $_POST['descripcion'];
        $producto1->estado = $_POST['estado'];
        $producto1->id = $_POST['id'];


        $producto1->update();
    }
    public function drop()
    {
        $producto1 = new producto();
        $producto1->estado = 0;
        $producto1->id = $_POST['id'];


        $producto1->delete();
    }
}

$producto1 = new productoControlador();

if ($_POST['accion'] == 1) {
    $producto1->guardar();
} else if ($_POST['accion'] == 2) {
    $producto1->actualizar();
} else  if ($_POST['accion'] == 3) {
    $producto1->drop();
}
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
    <div class="container">

        <div class='row'>
            <div class='col-4'></div>
            <div class='d-grid gap-2 col-4'>
                <a href='../producto/ABCproductsSC.php' class='btn btn-success mb-3 mt-3'>Regresar</a>
            </div>
            <div class='col-4'></div>
        </div>
    </div>

</body>

</html>