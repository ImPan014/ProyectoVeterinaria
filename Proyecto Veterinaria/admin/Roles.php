<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/bone.png">

  <title>ABC</title>
</head>

<body>

  <?php
  include '../logica/conexion.php';
  $conn = new conexion();
  $conexion = $conn->conectar();

  $rs = $conexion->prepare("SELECT * FROM rol");
  $rs->execute();

  ?>

  <! -- ///////////////////////Permisos//////////////////////// -->

    <div class="p-3 mb-2">
      <div class="p-3 mb-2 mt-5" style="align-items: center; text-align:center;">
        <h1>CONFIGURACION DE ROLES</h1>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4">

            <div class="d-grid gap-2">
              <a class="btn btn-primary" href="admin.php">Regresar</a>
            </div>
          </div>
          <div class="col-4"></div>
        </div>
      </div>

      <div class="p-3 mb-2">
        <form action="">
          <div class=" row">
            <div class="col-2"></div>
            <div class="col-6">
              <div class="row mb-2">


                <! -- Permiso-->
                  <?php

                  while ($row = $rs->fetch()) {

                    echo '                
                  <div class="row mb-5">
                    <div class="col-6">
                    <label class="form-check-label" >
                          ' . $row['id'] . ". " . $row['nombre'] . '
                        </label>
                    </div>
                    ';
                    $checked = "";
                    $valor = "";
                    $color = "";
                    if ($row["estado"] == 1) {
                      $checked = "Activado";
                      $color = "green";
                      $valor = 0;
                    } else {
                      $checked = " Desactivado";
                      $color = "red";
                      $valor = 1;
                    }

                    echo '
                    <! -- Switch checkbox -->
                      <div class="form-check form-switch col-6">
                      <form method="POST" action="../logica/rolControlador.php"></form>

                        <form method="POST" action="../logica/rolControlador.php">
                        

                        <label class="form-check-label" for="accion" style="Color:' . $color . ';">
                        ' . $checked . '
                      </label>
                      <input type="hidden" name="estado" value="' . $valor . '">
                      <input type="hidden" name="id" value=' . $row['id'] . '>
                      <input type="hidden" name="accion" value="2">
                      
                        <input type="submit" value="Cambiar" class="btn btn-success">

                        </form>
                       
                        
                      </div>
                  </div>
                  <! -- Fin de Permiso-->
                  ';
                  }
                  ?>
              </div>
            </div>
          </div>
      </div>
    </div>


    </div>
    <script>
    setTimeout(() => {
      document.getElementById("alert").remove();
    }, 0);
  </script>

    <script type="text/javascript" src="Diseños\js\boostrap.min.js"></script>
</body>

</html>