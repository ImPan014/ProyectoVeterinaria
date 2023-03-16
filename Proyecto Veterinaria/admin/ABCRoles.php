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

      <! -- ///////////////////////Conexion//////////////////////// -->



            <div class="p-3 mb-2">
                  <div class="p-3 mb-2 mt-5" style="align-items: center; text-align:center;">
                        <h1>ABC ROLES</h1>
                  </div>
                  <?php

                  include '../logica/conexion.php';

                  $conexion = new conexion();

                  $conn = $conexion->conectar();

                  $query = "SELECT count(*) from rol";


                  $rs = $conn->prepare($query);

                  $rs->execute();

                  $resultado  = $rs->fetch();

                  $id = $resultado["count(*)"] + 1;


                  if (isset($_GET['Accion'])) {

                        echo ""

                  ?>
                        <div class="alert alert-warning text-center" role="alert">
                              ¡Acción no seleccionada o Información incompleta!
                        </div>

                  <?php ;
                  }
                  ?>

                  <div class="p-3 mb-2">
                        <form action="../logica/rolControlador.php" method="POST">

                              <div class=" row">
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                          <div class="row"><label class="form-check-label" for="flexRadioDefault1">
                                                      ID:
                                                </label>
                                                <input type="text" name="id" readonly value="<?php echo $id; ?>">
                                          </div>
                                          <div class="row"><label class="form-check-label" for="flexRadioDefault1">
                                                      ROL:
                                                </label>
                                                <input type="text" name="nombre" id="" class="">
                                          </div>


                                    </div>

                                    <div class="col-2"></div>

                                    <div class="col-4 mt-2">
                                          <input checked class="form-check-input" type="radio" name="accion" id="flexRadioDefault1" value="1">
                                          <label class="form-check-label" for="accion">
                                                ALTA
                                          </label><br><br>

                                          <!--<input class="form-check-input" type="radio" name="accion" id="flexRadioDefault1" value="2">
                                          <label class="form-check-label" for="accion">
                                                CAMBIO
                                          </label><br><br><br><br>-->
                                          <br><br><br><br>
                                    </div>

                              </div>
                              <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">

                                          <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="submit">Realizar operacion</button>
                                                <a class="btn btn-danger" href="admin.php">Regresar</a>
                                          </div>
                                    </div>
                                    <div class="col-4"></div>
                              </div>

                        </form>
                  </div>
            </div>
            </div>

            <script type="text/javascript" src="Diseños\js\boostrap.min.js"></script>
            <script>
    setTimeout(() => {
      document.getElementById("alert").remove();
    }, 0);
  </script>
</body>

</html>