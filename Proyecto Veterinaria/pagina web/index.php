<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
  <title>Inicio</title>
</head>

<body>

  <?php

  include '../logica/conexion.php';

  $conexion = new conexion();

  $conn = $conexion->conectar();
  $rs = $conn->query("select * From producto");

  ?>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Veterinaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">información</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <?php

      while ($row = $rs->fetch()) {
        echo '<a href="" style="text-decoration: none; Color: black;">
                <div class="card mt-3" style="width: 18rem;">
                  <img src="../assets/SliderIndexImg/gato.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$row['nombre'].'</h5>
                    <p class="card-text">'.$row['descripcion'].'</p>
                  </div>
                </div>
              </a>';
      }


      ?>
      <div class="row">

      </div>

    </div>
    <script src="../diseños/js/bootstrap.min.js"></script>
    <script src="../diseños/js/bootstrap.esm.min.js"></script>
    <script src="../diseños/js/bootstrap.bundle.min.js"></script>
    <script>
      setTimeout(() => {
        document.getElementById("alert").remove();
      }, 0);
    </script>
</body>

</html>