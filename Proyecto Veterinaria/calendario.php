<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar cita</title>
  <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
  <link rel="shortcut icon" href="assets/bone.png">
  <script src="diseños/js/jquery-3.6.0.min.js"></script>
  <script src="diseños/js/bootstrap.min.js"></script>
  <style>
    :root {
      --bs-success-rgb: 71, 222, 152 !important;
    }

    html,
    body {
      height: 100%;
      width: 100%;
    }

    .btn-info.text-light:hover,
    .btn-info.text-light:focus {
      background: #000;
    }

    table,
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
      border-color: #ededed !important;
      border-style: solid;
      border-width: 1px !important;
    }

    h2 {
      color: white;

    }
  </style>
</head>

<?php

session_start();

include 'logica/conexion.php';

$conexion = new conexion();

$conn = $conexion->conectar();

if (isset($_SESSION['Activa'])) {
  $query = $conn->query("select id from usuario where email = '" . $_SESSION['email'] . "'");

  $rs = $query->fetch();
}



?>

<body class="bg-light">
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
  if (isset($_GET['error'])) {
    echo ""
  ?>
    <div class="container">
      <div class="alert alert-warning text-center" role="alert">
        Ingrese datos correctos por favor
      </div>
    </div>
  <?php ;
  }

  ?>

  <form method="POST" action="calendariControlador.php">

    <div class="container py-5" id="page-container">
      <div class="row">
        <div class="col-md-4">
          <div id="calendar"></div>
        </div>
        <div class="col-md-3">
          <div class="cardt rounded-0 shadow">
            <div class="card-header bg-gradient bg-primary text-light">
              <h5 class="card-title text-center">Crear Cita</h5>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <form action="save_schedule.php" method="post" id="schedule-form">

                  <?php

                  if ($_SESSION['id_rol'] == 1) {
                    echo ""
                  ?>
                    <input type="hidden" name="id_cliente" value="<?php echo $rs['id']; ?>">
                    <input type="hidden" name="user" value="1">
                  <?php ;
                  }

                  if ($_SESSION['id_rol'] == 2) {
                    $rsMedico = $conn->query("select id From medico where id_usuario = " . $_SESSION['id']);
                    $rsMedico->execute();
                    $id_medico = $rsMedico->fetch();
                    echo ""
                  ?>
                    <div class="form-group mb-2 mt-3">
                      <label for="nombre" class="control-label">Cliente:</label>
                      <select name="id_cliente" id="formGroupExampleInput2">
                        <?php
                        $rs = $conn->query("select * From cliente");
                        $rs->execute();
                        while ($row = $rs->fetch()) {
                          echo ""
                        ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['id'] . " : " . $row['nombre'] . " " . $row['apellido_paterno']; ?></option>
                        <?php ;
                        }
                        ?>
                      </select>
                    </div>
                    <input type="hidden" name="user" value="2">
                    <input type="hidden" name="id_medico" value="<?php echo $id_medico['id']; ?>">
                  <?php ;
                  }

                  ?>
                  <div class="form-group mb-2">
                    <label for="nota" class="control-label">Nota</label>
                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="nota" id="nota"></textarea>
                  </div>
                  <div class="form-group mb-2">
                    <label for="fecha_incio" class="control-label">Inicio</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fecha_incio" id="fecha_incio">
                  </div>
                  <div class="form-group mb-2">
                    <label for="fecha_fin" class="control-label">Fin</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fecha_fin" id="fecha_fin">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-footer pb-3">
              <div class="text-center">
                <button class="btn btn-primary" name="accion" value="1" type="submit">Aceptar</button>
                <a class="btn btn-danger" href="user.php">Cancelar</a><br>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
  <script>
    setTimeout(() => {
      document.getElementById("alert").remove();
    }, 0);
  </script>
</body>