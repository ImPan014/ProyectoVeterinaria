<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../diseños/css/bootstrap.min.css">
	<link rel="stylesheet" href="../diseños/ABCproductos.style.css">
	<link rel="stylesheet" href="../diseños/css/datatables.min.css">
    <link rel="shortcut icon" href="../assets/bone.png">
	<title>Permiso</title>
</head>

<body>
	<form method="POST" action="permisoControlador.php">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col col-md-8 mt-5">
					<div class="mb-3 row">
						<label for="inputtext" class="col-sm-2 col-form-label">Id: </label>
						<div class="col-sm-10">
							<input name="id" type="text" class="form-control" id="inputtext">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputtext" class="col-sm-2 col-form-label">Nombre: </label>
						<div class="col-sm-10">
							<input name="nombre" type="text" class="form-control" id="inputtext">
						</div>
					</div>
					<button class="btn btn-primary" value="Guardar" type="submit">Aceptar</button>
					<a class="btn btn-primary" href="admin.php">Cancelar</a>
				</div>
				<div class="col col-md-4">
					<div class="form-check mt-5">
						<input name="accion" class="form-check-input" type="radio" value="1" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							Alta
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" name="accion" type="radio" value="3" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							Baja
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" name="accion" type="radio" value="2" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							Cambio
						</label>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>

	<script src="../diseños/js/bootstrap.min.js"></script>
</body>

</html>