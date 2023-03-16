<?php

session_start();

if (isset($_SESSION['Activa'])) {
    $query = "Select id from usuario where email  = '" . $_SESSION['email'] . "' ";

    include 'logica/conexion.php';

    $conexion = new conexion();
    $conn = $conexion->conectar();

    $col = $conn->query($query);

    $rs = $col->fetch();
}



?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="assets/bone.png">
    <link rel="stylesheet" type="text/css" href="diseños/css/bootstrap.min.css">
    <title>Actualizar información</title>
</head>

<body>

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
                        <a class='nav-link' href='#'>información</a>
                    </li>
                    <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] == 3) {
                            echo ""
                    ?>
                            <li class='nav-item'>
                                <a class='nav-link' href='admin/admin.php'>administración</a>
                            </li>
                    <?php
                        }
                    };
                    ?>
                    <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] == 2) {
                            echo ""
                    ?>
                            <li class='nav-item'>
                                <a class='nav-link' href='calendario.php'>Agendar cita</a>
                            </li>
                    <?php
                        }
                    };
                    ?>
                </ul>


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
                    <a href="inicioSesion.php" class=" d-flex btn btn-success">Iniciar sesión</a>
                <?php ;
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container">

        <form action="logica/actUsuarioControlador.php" method="POST" class="ms-5 border border-secondary ps-5 pb-3 pt-3 border-3 rounded">
            <input type="hidden" name="id" value="<?php echo $rs['id']; ?>">
            <?php
                $query = "Select * from cliente where id  = ".$rs['id'];

                $col = $conn->query($query);

                $rows = $col->fetch();
            
            ?>
            <div class="form-group">
                <label for="InputName">Nombre: </label>
                <input style="width: 50%;" name="nombre" type="text" class="form-control" id="InputName" value="<?php echo $rows['nombre']; ?>">

                <label for="formGroupExampleInput2">Apellido Paterno: </label>
                <input style="width: 50%;" name="apellido_paterno" type="text" class="form-control" id="formGroupExampleInput2"value="<?php echo $rows['apellido_paterno']; ?>">

                <label for="formGroupExampleInput2">Apellido materno: </label>
                <input style="width: 50%;" name="apellido_materno" type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $rows['apellido_materno']; ?>">
            </div>
            <?php

            if (isset($_SESSION['id_rol'])) {
                if ($_SESSION['id_rol'] == 2) {

                    echo ""
            ?>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">RFC</label>
                        <input name="rfc" type="text" class="form-control" id="formGroupExampleInput2" placeholder="RFC">
                    </div>

            <?php ;
                }
            }

            ?>

            <div class="form-row align-items-center">
                <?php
                if (isset($_SESSION['Activa'])) {
                    if ($_SESSION['id_rol'] == 1) {
                        echo " ";
                ?>
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Sexo</label>
                            <select name="sexo" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Selecciona...</option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                            </select>
                        </div>
                <?php ;
                    }
                }
                ?>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Telefono</label>
                    <input style="width: 50%;" type="text" class="form-control" id="formGroupExampleInput2" name="telefono" value="<?php echo $rows['apellido_materno']; ?>" >
                </div>
                <div class="form-row align-items-center">
                    <?php
                    if (isset($_SESSION['Activa'])) {
                        if ($_SESSION['id_rol'] == 2) {
                            echo "";
                    ?>
                            <div class="col-auto my-1">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Estado</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Selecciona...</option>
                                    <option value="1">Aguascalientes</option>
                                    <option value="2">Baja California</option>
                                    <option value="3">Baja California Sur</option>
                                    <option value="4">Campeche</option>
                                    <option value="5">Chiapas</option>
                                    <option value="6">Chihuahua</option>
                                    <option value="7">Coahuila</option>
                                    <option value="8">Colima</option>
                                    <option value="9">CDMX</option>
                                    <option value="10">Durango</option>
                                </select>
                            </div>
                    <?php ;
                        }
                    }
                    ?>
                    <div class="col  mt-3">
                        <a href="user.php" class="btn btn-danger">Cancelar</a>

                        <input type="submit" class="btn btn-success" value="Realizar">
                    </div>
        </form>
    </div>
    <script src="Diseño/js/bootstrap.min.js"></script>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 0);
    </script>
</body>

</html>