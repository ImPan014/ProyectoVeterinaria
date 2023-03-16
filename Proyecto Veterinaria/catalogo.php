<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/bone.png">
    <title>Catalogo</title>
</head>

<body>

    <?php


    include 'logica/conexion.php';

    session_start();

    $conexion = new conexion();

    $conn = $conexion->conectar();

    $query = "SELECT * from inventario";


    $rs = $conn->prepare($query);

    $rs->execute();

    //var_dump($id);


    /* while ($id > 0) {

        $rs = $conn->query("select * From inventario where id = " . $id);
        $rs->execute();
        $rowsInventario = $rs->fetch();
        $rs = $conn->query("select * From inventario where id = " . $rowsInventario['id_producto']);
        $rs->execute();
        $rowsproducto = $rs->fetch();
        $id--;
        echo "<br>";
    }*/


    ?>
    <nav class='navbar navbar-expand-lg navbar-light pt-4 pb-4'>
        <div class='container-fluid'>
            <a class="navbar-brand" href="index.php">
                <img src="assets/bone-ico.png" alt="" width="32" height="32" class="d-inline-block align-text-top">
                Veterinaria
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarText'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>

                    <li class='nav-item'>
                        <a class='nav-link' href='#'>Información</a>
                    </li>
                    <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] == 3) {
                            echo ""
                    ?>
                            <li class='nav-item'>
                                <a class='nav-link' href='admin/admin.php'>Administración</a>
                            </li>
                    <?php
                        }
                    };
                    ?>
                    <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] == 2) {
                            echo ""
                    ?>
                            <li class='nav-item'>
                                <a class='nav-link' href='calendario.php'>Agendar cita</a>
                            </li>
                    <?php
                        }
                    };
                    ?>
                </ul>

                <?php
                if (isset($_SESSION['Activa'])) {
                    if ($_SESSION['id_rol'] != 3) {
                        echo ""
                ?>
                        <a href="user.php" class=" d-flex btn btn-success mx-3"><img src="assets/user-ico-btn.png" alt="user" width="24" height="24"></a>
                <?php
                    }
                };
                ?>
                <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] != 3) {
                            echo ""
                ?>
                    <a href="carrito.php" class=" d-flex btn btn-success mx-3"><img src="assets/carrito_compra.png" alt="cart" width="24"   height="24"></a>
                <?php
                ;}
                }
                ?>

                <?php
                if (isset($_SESSION['Activa'])) {
                    echo ""
                ?>
                    <a href="cerrarSesion.php" class=" d-flex btn btn-success mx-3">Cerrar Sesión</a>

                <?php ;
                }
                ?>
                <?php
                if (!isset($_SESSION['Activa'])) {
                    echo ""
                ?>
                    <a href="inicioSesion.php" class=" d-flex btn btn-success me-5">Iniciar sesión</a>
                    <a href="registroUsuario.php" class=" d-flex btn btn-success me-5">Registrarse</a>
                <?php ;
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row text-center">


            <?php

            while ($resultado  = $rs->fetch()) {

                $rsInven = $conn->query("select * From inventario where id = " . $resultado['id']);
                $rsInven->execute();
                $rowsInventario = $rsInven->fetch();

                //var_dump($rowsInventario);

                $rsProc = $conn->query("select * From producto where id = " . $rowsInventario['id_producto']);
                $rsProc->execute();
                $rowsproducto = $rsProc->fetch();
                if (!$rowsInventario['stock'] == 0 && !$rowsproducto['estado'] == 0) {
                    echo ""
            ?>

                    <div class="card border-dark mt-2 w-25">
                        <img src="<?php echo $rowsproducto['imageURL']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rowsproducto['nombre']; ?></h5>
                            <p class="card-text"><?php echo $rowsproducto['descripcion']; ?></p>
                            <p class="card-text" style="Color: green;">$<?php echo $rowsInventario['precio_venta']; ?></p>

                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <form action="agregarCarrito.php" method="POST">
                                <input type="submit" class="btn btn-primary" value="Agregar al carrito">
                                <input type="hidden" name="id_producto" value="<?php echo $rowsproducto['id']; ?>">
                            </form>
                        </div>
                    </div>
            <?php
                }
            }

            ?>



        </div>
    </div>

    <script src="diseños/js/bootstrap.min.js"></script>
    <script src="diseños/js/bootstrap.esm.min.js"></script>
    <script src="diseños/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 0);
    </script>
</body>

</html>