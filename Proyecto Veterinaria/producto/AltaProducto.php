<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
    <link rel="stylesheet" href="../diseños/AltaProducto.style.css">
    <title>Alta producto</title>
</head>

<body>


    
    <div class="container mt-4">
        <h2 class="centrado">Producto Nuevo</h2>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
            <form action="../logica/productoControlador.php" method="post">
                <div class="row align-items-center mb-4 ">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <label for="inputId" class="col-form-label">Id:</label>
                    </div>
                    <div class="col-4">
                        <input type="number" id="inputId" class="form-control" name="id" required>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <label for="inputNombre" class="col-form-label">Nombre:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" id="inputNombre" class="form-control" name="nombre" required>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <label for="inputDescripcion" class="col-form-label">Descripción:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" id="inputDescripcion" class="form-control" name="descripcion" required>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <label for="estado" class="col-form-label">Estado:</label>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="1" required> Alta
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="0" required> Baja
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="d-grid gap-2 col-4">
                        <input type="submit" class="btn btn-success btn-sm" value="Aceptar">
                        <a type="button" class="btn btn-warning btn-sm" href="ABCproductsSC.php">Cancelar</a>
                    </div>
                    <div class="col-4"></div>
                </div>
                <input type="hidden" name="accion" value="1">
            </form>
        </div>
    </div>
    <script src="diseños/js/bootstrap.min.js"></script>
</body>

</html>