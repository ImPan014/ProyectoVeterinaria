<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/bone.png">
	<title>Permiso</title>
	<link rel="stylesheet" href="Diseño/css/bootstrap.min.css">
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
					<button class="btn btn-primary" type="button">Cancelar</button>
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
	
	<script src="Diseño/js/bootstrap.min.js"></script>
	</body>
</html>