<?php

session_start();

include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

try {
    $query = "SELECT count(*) FROM venta";
    $rs = $conn->query($query);
    $row = $rs->fetch();
    $id_venta = $row['count(*)'] + 1;
    $id_usuario = $_SESSION['id'];
    $fecha = date('Y-m-d');
    $total = $_POST['total'];

    $query = "INSERT INTO venta (id, id_usuario, fecha, total) VALUES ($id_venta, $id_usuario, '$fecha', $total);";
    $rs = $conn->prepare($query);
    $rs->execute();
    $query = "SELECT * FROM carrito WHERE id_usuario = $id_usuario;";
    $rs = $conn->query($query);

    while ($rowCarrito = $rs->fetch()) {
        $query = "SELECT * FROM producto WHERE id = " . $rowCarrito['id_producto'];
        $rsProducto = $conn->query($query);
        $rowProducto = $rsProducto->fetch();
        $query = "SELECT * FROM inventario WHERE id_producto =" . $rowCarrito['id_producto'] . " AND stock <> 0 ;";
        $rsInventario = $conn->query($query);
        $rowInventario = $rsInventario->fetch();
        $cantidad = $rowCarrito['cantidad'];
        $id_producto = $rowProducto['id'];
        $precio = $cantidad * $rowInventario['precio_venta'];
        $query = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio) VALUES ($id_venta, $id_producto, $cantidad, $precio);";
        $rsVenta = $conn->prepare($query);
        $rsVenta->execute();
    }
    $query = "DELETE  FROM carrito WHERE id_usuario = $id_usuario;";
    $rs = $conn->prepare($query);
    $rs->execute();
} catch (\Throwable $th) {
    echo $th;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="diseños/css/bootstrap.min.css">
	<link rel="shortcut icon" href="assets/bone.png">
	<title>Iniciar sesión</title>
</head>

<body>
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

  <div class="container border border-success border-3 rounded text-center w-50" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

      <div class="container text-center mt-5">
          <h1>Compra realizada</h1>
      </div>
      <div class="container mb-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="alert alert-success mt-5" role="alert">
              <strong>¡Pago acreditado!</strong>
          </div>
          <a href="catalogo.php" class="btn btn-success">Volver</a>
      </div>
  </div>



	<script src="../Diseño/js/bootstrap.min.js"></script>
	<script>
		setTimeout(() => {
			document.getElementById("alert").remove();
		}, 0);
	</script>

</body>

</html>