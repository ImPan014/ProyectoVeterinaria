<?php

include 'rol.php';


if(!isset($_POST['accion'])){
    header('Location: ../admin/ABCRoles.php?Accion=0');
}

class rolControlador
{

    public function guardar()
    {

        $rol1 = new rol();

        $rol1->id = $_POST['id'];
        $rol1->nombre = $_POST['nombre'];
        $rol1->estado = 1;


        $rol1->insert();
    }
    public function actualizar()
    {
        $rol1 = new rol();
        $rol1->estado = $_POST['estado'];
        $rol1->id = $_POST['id'];

        $rol1->update();
    }
    public function drop()
    {
        $rol1 = new rol();
        $rol1->estado = 0;
        $rol1->id = $_POST['id'];


        $rol1->delete();
    }
}

$rol1 = new rolControlador();

if ($_POST['accion'] == 1) {
    $rol1->guardar();
} else if ($_POST['accion'] == 2) {
    $rol1->actualizar();
} else  if ($_POST['accion'] == 3) {
    $rol1->drop();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class='row'>
            <div class='col-4'></div>
            <div class='d-grid gap-2 col-4'>
                <a href='../admin/Roles.php' class='btn btn-success mb-3 mt-3'>Regresar</a>
            </div>
            <div class='col-4'></div>
        </div>
    </div>

</body>

</html>