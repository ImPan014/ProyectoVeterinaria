<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/bone.png">

    <title>Administración</title>
</head>

<?php

session_start();

?>

<body>
    <nav class='navbar navbar-expand-lg navbar-light pt-4 pb-4'>
        <div class='container-fluid'>
        <a class="navbar-brand" href="../index.php">
        <img src="../assets/bone-ico.png" alt="" width="32" height="32" class="d-inline-block align-text-top">
        Veterinaria
      </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarText'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    
                    <li class='nav-item'>
                        <a class='nav-link' href='../catalogo.php'>Catalogo</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='#'>Información</a>
                    </li>
                </ul>
                <a href="../cerrarSesion.php" class=" d-flex btn btn-success">Cerrar sesión</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3>Productos</h3>
                <a href="ABCproductsSC.php" class="btn btn-success">Productos</a>
                <h3>Inventario</h3>
                <a href="Inventario.php" class="btn btn-success">Inventario</a>
                <h3>Medicos</h3>
                <a href="" class="btn btn-success">Medicos</a>
                <h3>Roles</h3>
                <a href="ABCRoles.php" class="btn btn-success">ABC Roles</a>
                <a href="Roles.php" class="btn btn-success">Configuración</a>
                <h3>Permisos</h3>
                <a href="Permiso.php" class="btn btn-success">ABC Permisos</a>
            </div>
        </div>
    </div>
</body>

</html>