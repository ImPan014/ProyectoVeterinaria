<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
  <link rel="shortcut icon" href="assets/bone.png">
  <title>Usuario</title>
</head>

<body>
  <?php

  session_start();

  include 'logica/conexion.php';

  $conexion = new conexion();

  $conn = $conexion->conectar();

  if ($_SESSION['Activa']) {

    if($_SESSION['id_rol'] == 1){
        $rs = $conn->query('SELECT * FROM cliente WHERE id = ' . $_SESSION['id']);
    }else if($_SESSION['id_rol'] == 2){
      $rs = $conn->query('SELECT * FROM medico WHERE id_usuario = ' . $_SESSION['id']);
    }

    

    $cols = $rs->fetch();


  }


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
        <?php
        ;
        }
        ?>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">

      <div class="card mt-3" style="width: 18rem; ">
        <img src="assets/user.png" class="card-img-top" alt="user">
        <div class="card-body">
        <?php
          if (isset($_SESSION['Activa'])) {
            if ($_SESSION['id_rol'] == 1) {
              echo ""
          ?>
          <a href="actUsuario.php" class="btn btn-primary">Cambiar información</a>
          <a href="#" class="btn btn-danger mt-2">Eliminar cuenta</a>
          <?php
            }
          };
          ?>
        </div>
      </div>
      <div class="card mt-3 ms-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $cols['nombre'] . " " . $cols['apellido_paterno'] . " " . $cols['apellido_materno']; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo "#".$cols['id']; ?></h6>
          <p class="card-text">
           <b>Correo:</b> <br> <?php echo $_SESSION['email']; ?><br>
           <b>Sexo:</b><br> <?php echo $cols['sexo']; ?> <br>
           <b>Contacto:</b><br> <?php echo $cols['telefono']; ?>
          </p>
        </div>
      </div>
      <?php
          if (isset($_SESSION['Activa'])) {
            if ($_SESSION['id_rol'] == 2) {
              echo ""
          ?>
      <div class="card mt-3 ms-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Acciones</h5>
          <h6 class="card-subtitle mb-2 text-muted">Medico</h6>
          <p class="card-text">
            <a href="citasDia.php" class="btn btn-primary">Ver citas</a> del dia <br>
            <a href="calendario.php" class="btn btn-primary mt-2">Agendar cita</a>
          </p>
        </div>
      </div>
      <?php
            }
          };
          ?>
          <?php
          if (isset($_SESSION['Activa'])) {
            if ($_SESSION['id_rol'] == 1) {
              echo ""
          ?>
      <div class="card mt-3 ms-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Acciones</h5>
          <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
          <p class="card-text">
            <a href="calendario.php" class="btn btn-primary mt-2">Agendar cita</a>
            <a href="tablacalendario.php" class="btn btn-primary mt-2">Mis citas</a>
          </p>
        </div>
      </div>
      <?php
            }
          };
          ?>
    </div>
  </div>
  <script>
    setTimeout(() => {
      document.getElementById("alert").remove();
    }, 0);
  </script>
</body>

</html>