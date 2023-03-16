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

				</ul>

			</div>
		</div>
	</nav>

	<div class="container text-center mt-5">
		<h1>Iniciar sesión</h1>
	</div>
	<div class="container" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
		<?php
		if (isset($_GET['error'])) {
			echo ""
		?>
			<div class="alert alert-danger text-center" role="alert">
				¡Informacion incorrecta!
			</div>
		<?php ;
		}
		?>
		<form style="display: flex; flex-direction: column; align-items: center; justify-content: center;" class="mt-5 border border-success border-3 rounded text-center w-50" action="logica/usuarioControlador.php" method="POST">

			<label for="inputEmail" class="form-label ">Correo:</label>
			<input  name="email" type="email" class="form-control w-50" id="inputEmail " placeholder="example @gmail.com">


			<label for="inputPassword" class="form-label">Contraseña:</label>

			<input placeholder="*******" name="password" type="password" class="form-control w-50" id="inputPassword">



			<input type="submit" class="btn btn-success mt-3" name="entrar" value="Iniciar Sesión"><br>
			<p>¿No tienes cuenta? <a href="registroUsuario.php">Registrate</a></p>
			<p>¿Olvidaste tu contraseña? <a href="recuperarContraseña.php">Recuperar contraseña</a></p>

		</form>
	</div>



	<script src="../Diseño/js/bootstrap.min.js"></script>
	<script>
		setTimeout(() => {
			document.getElementById("alert").remove();
		}, 0);
	</script>

</body>

</html>