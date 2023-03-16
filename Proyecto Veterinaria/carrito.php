<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/bone.png">
    <title>Carrito</title>
</head>

<body>

    <?php


    include 'logica/conexion.php';

    session_start();

    $conexion = new conexion();

    $conn = $conexion->conectar();


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
    <?php

    $rowsCarrito = $conn->query("select * From carrito where id_usuario =" . $_SESSION['id']);
    


    ?>

    <div class="container">
        <h2 class="text-start">Mi carrito</h2>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="inventario" class="display table  table-hover table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Sub total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cantidadPago = 0;
                        while($rows = $rowsCarrito->fetch()){
                            $subtotal = 0;
                            $rsProductos = $conn->query("select * From producto where id =" . $rows['id_producto']);
                            $rowsProductos = $rsProductos->fetch();

        $rsInventario = $conn->query("SELECT * FROM inventario WHERE id_producto =" . $rows['id_producto']. " AND stock <> 0 ;");
                            $rowsInventario = $rsInventario->fetch();
                        ?>
                    <tr>
                            <td col=row class='vertical'><?php echo $rowsProductos['nombre']; ?></td>
                            <td col=row class='vertical'><?php echo $rows['cantidad']; ?></td>
                            <td col=row class='vertical'><?php echo $rowsInventario['precio_venta']; ?></td>
        <td col=row class='vertical'><?php echo $subtotal = $rowsInventario['precio_venta'] * $rows['cantidad']; ?></td>
                            <td col="row" style="display: flex; align-items: center; justify-content: center;">
                            
                                    <form action="agregarCarrito.php" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $rowsProductos['id']; ?>">
                                        <div class="d-grid gap-2 col-6 mx-auto mb-1">
                                        <input class="btn btn-success btn-sm" title="boton enviar" alt="boton enviar" src="assets/mas.png" type="image" width="32" height="32"/>
                                        </div>
                                    </form>
                                    <form action="EliminarProdCarrito.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $rowsProductos['id']; ?>">
                                        <div class="d-grid gap-2 col-6 mx-auto mb-1">
                                        <input class="btn btn-danger btn-sm mx-2" title="boton enviar" alt="boton enviar" src="assets/x.png" type="image" width="32" height="32"/>
                                        </div>
                                    </form>
                            <?php $cantidadPago =  $cantidadPago + $rowsInventario['precio_venta'] * $rows['cantidad'] ; ?>
                        </td>
                            </tr>
                        
                            <?php
                        }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Total: $<?php echo $cantidadPago; ?></th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-end">
                <a class="btn btn-warning" href="catalogo.php">Volver</a>
                    <?php
                    $rowsCarrito = $conn->query("select * From carrito where id_usuario =" . $_SESSION['id']);
                    $rs = $rowsCarrito->fetch();
                    if(isset($rs['id'])){
                        echo ""
                    ?>
                    <a class="btn btn-success" href="pago.php">Pagar</a>
                    <?php
                    ;}
                    ?>
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
            $('#inventario').DataTable({
                scrollY: '320px',
                scrollCollapse: true,
                paging: false,
            });
        });
    </script>
</body>

</html>