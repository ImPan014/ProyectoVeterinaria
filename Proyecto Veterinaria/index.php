<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
  <link rel="shortcut icon" href="assets/bone.png">
  <title>Inicio</title>
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

  <?php

  if (isset($_SESSION['Activa'])) {

    $rs = $conn->query('SELECT * FROM cliente WHERE id = ' . $_SESSION['id']);

    $cols = $rs->fetch();

  if($_SESSION['Activa'] && $_SESSION['id_rol'] == 1){
    echo ""
  ?>
  
  <div class="container mb-3">
    <h3 class="text-center">Bienvenido <?php echo $cols['nombre'] . " " . $cols['apellido_paterno'] . " " . $cols['apellido_materno']; ?></h3>
  </div>

  <?php
  
  ;

  }
  }
  ?>
  <div>
    <img class=""src="assets/SliderIndexImg/gato.jpg" alt="gato" width="100%" height="450" style="object-fit: cover;
      object-position: center center; filter: brightness(50%);">
      <a href="catalogo.php" class="btn btn-primary" style="position: absolute; top: 75%; left:45%;">Catalogo</a>
      <p style="position: absolute; top: 30%; left:30%; Color:white; font-size: 44px;">Productos para tu mascota</p>
  </div>

  

  <div class="container">

    <div class="row">

        

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