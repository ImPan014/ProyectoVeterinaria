<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="diseños/css/bootstrap.min.css">
</head>

<body class="container position-relative">

    <h1 style="text-align:center !important;">Registro </h1>
    <?php
    if (isset($_GET['incom'])) {
        echo ""
    ?>
        <div class="alert alert-warning text-center" role="alert">
            ¡Información incompleta o incorrecta!
        </div>
    <?php ;
    }
    ?>
    <?php
    if (isset($_GET['error'])) {
        echo ""
    ?>
        <div class="alert alert-warning text-center" role="alert">
            ¡Correo en uso!
        </div>
    <?php ;
    }
    ?>
    <form method="post" action="regUsuarioControlador.php" class="ms-5 border border-secondary ps-5 pb-3 pt-3 border-3 rounded">

        <div class="form-group pe-5 w-50">
            <label for="formGroupExampleInput2" style="text-align:left !important">Email</label>
            <input require name="email" type="email" class="form-control" id="inputEmail" placeholder="ejemplo@ejemplo.com">

            <label for="formGroupExampleInput2">Password:</label>
            <input require type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password">

            <label for="InputName">Nombre:</label>
            <input require type="text" class="form-control" id="InputName" placeholder="Nombre" name="nombre">

            <label for="formGroupExampleInput2">Apellido paterno:</label>
            <input require type="text" class="form-control" id="formGroupExampleInput2" placeholder="Apellido paterno" name="apellido_paterno">

            <label for="formGroupExampleInput2">Apellido materno:</label>
            <input require type="text" class="form-control" id="formGroupExampleInput2" placeholder="Apellido materno" name="apellido_materno">

            
            <label class="mr-sm-2 mt-2" for="inlineFormCustomSelect">Sexo</label>
            <select require class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sexo">
                <option selected>Selecciona...</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
            <br>
            <label for="formGroupExampleInput2">Telefono</label>
            <input require type="number" class="form-control" id="formGroupExampleInput2" placeholder="telefono" name="telefono">


            <input type="submit" class="btn btn-success mt-4" value="Registrar">

        </div>
    </form>
    <div class="position-absolute" style="position: absolute; top: 80%; left:55%; font-size: 18px;">
        <p>¿Ya tienes cuenta? <a href="inicioSesion.php">Inicia sesión</a></p>
        <p>¿Olvidaste tu contraseña? <a href="recuperarContraseña.php">Recuperar contraseña</a></p>
    </div>
</body>

</html>