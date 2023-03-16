<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/bone.png">
    <title>Pago</title>
</head>

<body>
    <?php


    include 'logica/conexion.php';

    session_start();

    $conexion = new conexion();

    $conn = $conexion->conectar();
    $rs = $conn->query("select * From producto");

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
                        <a class='nav-link' href='catalogo.php'>Catalogo</a>
                    </li>
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
                </ul>

                <?php
                if (isset($_SESSION['Activa'])) {
                    if ($_SESSION['id_rol'] != 3) {
                        echo ""
                ?>
                        <a href="user.php" class=" d-flex btn btn-success mx-3"><img src="assets/user-ico-btn.png" alt="user" width="24" height="24"></a>
                        <a href="carrito.php" class=" d-flex btn btn-success mx-3"><img src="assets/carrito_compra.png" alt="cart" width="24" height="24"></a>
                <?php
                    }
                };
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
        <h1 class="text-center">Pago</h1>
    </div>
    <div class="container">
        <?php if(isset($_GET['incom'])){ echo "" ?>
        <div class="alert alert-warning text-center" role="alert">
            Información incompleta o incorrecta.
        </div>
        <?php
        ;}
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <table id="productos" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cantidadPago = 0;
                        $rolCarrito = $conn->query("SELECT * FROM carrito WHERE id_usuario = " . $_SESSION['id']);
                        while ($rowCarrito = $rolCarrito->fetch()) {

                            $rolProducto = $conn->query("SELECT * FROM producto WHERE id = " . $rowCarrito['id_producto']);
                            $rowProducto = $rolProducto->fetch();

    $rsInventario = $conn->query("SELECT * FROM inventario WHERE id_producto =" . $rowCarrito['id_producto']. " AND stock <> 0 ;");
                            $rowsInventario = $rsInventario->fetch();
                        ?>
                            <tr>
                                <td><?php echo $rowProducto['nombre']; ?></td>
                                <td><?php echo $rowCarrito['cantidad']; ?></td>
                            </tr>
                        <?php
                        $cantidadPago =  $cantidadPago + $rowsInventario['precio_venta'] * $rowCarrito['cantidad'] ;
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="text-start">
                    <a href="carrito.php" class="btn btn-warning">Volver</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <form action="PagoConfirmacion.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $cantidadPago; ?>" name="total">
                        <label class="form-label"><b>Total:</b> $<?php echo $cantidadPago; ?> </label><br>
                        <label for="titular" class="form-label">Titular:</label>
                        <input required type="text" class="form-control" name="titular" id="titular" aria-describedby="helpId" placeholder="">

                        <label for="numTarjeta" class="form-label">Tarjeta:</label>
                        <input required type="number" class="form-control" name="numTarjeta" id="numTarjeta" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">18 digitos</small>
                        <br>
                        <label for="fhCaducidad" class="form-label">Fecha de caducidad:</label>
                        <input required type="date" class="form-control" name="fhCaducidad" id="fhCaducidad" aria-describedby="helpId" placeholder="">
                        <label for="cvc" class="form-label">cvc:</label>
                        <input required type="number" class="form-control" name="cvc" id="cvc" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">3 digitos</small>
                        <br>
                        <div class="text-end">
                            <input type="submit" value="Pagar" class="btn btn-success">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="diseños/js/bootstrap.min.js"></script>
    <script src="diseños/js/datatables.min.js"></script>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 0);
    </script>
    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                scrollY: '200px',
                scrollCollapse: true,
                paging: false,
            });
        });
    </script>
</body>

</html>