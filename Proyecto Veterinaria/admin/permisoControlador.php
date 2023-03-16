<?php

include 'operacion.php';

class permisoControlador
{

    public function guardar()
    {

        $operacion1 = new operacion();
        $operacion1->id = $_POST['id'];
        $operacion1->nombre = $_POST['nombre'];
        $operacion1->estado = 1;
        $operacion1->insert();
    }
    public function actualizar()
    {
        $operacion1 = new operacion();
        $operacion1->nombre = $_POST['nombre'];
        $operacion1->id = $_POST['id'];


        $operacion1->update();
    }
    public function drop()
    {
        $operacion1 = new operacion();
        $operacion1->estado = 0;
        $operacion1->id = $_POST['id'];


        $operacion1->delete();
    }
}

$operacion1 = new permisoControlador();

if ($_POST['accion'] == 1) {
    $operacion1->guardar();
} else if ($_POST['accion'] == 2) {
    $operacion1->actualizar();
} else  if ($_POST['accion'] == 3) {
    $operacion1->drop();
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