<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Alta</title>
</head>

<body>
    <div class="container">
        <?php

        include 'conexion.php';
        class app
        {

            public function insert()
            {

                $nombreTabla = get_class($this);

                $atributos = array();

                foreach ($this as $indice => $valor) {
                    $atributos[$indice] = $valor;
                }

                $query = "INSERT INTO " . $nombreTabla . " (";

                foreach ($atributos as $indice => $valor) {
                    $query = $query . " " . $indice . ",";
                }
                $query = substr($query, 0, -1) . ") VALUES (";

                foreach ($atributos as $indice => $value) {
                    $query = $query . " '" . $value . "',";
                }

                $query = substr($query, 0, -1) . " )";

                $conexion = new conexion();

                $conn = $conexion->conectar();

                $rs = $conn->prepare($query);
                try {
                    $rs->execute();
                    echo '<div class="alert alert-success" role="alert" id="alert">
                        ¡Guardado Correctamente!
                        </div>';
                    echo '<h1 style="text-align: center;" id="commit">¡Hecho!</h1>';
                } catch (\Throwable $th) {
                    echo '<div class="alert alert-danger" role="alert" id="alert">
                    ¡Error al guardar!
                    </div>';
                    echo '<h1 style="text-align: center;" id="error">¡Ups!, algo salio mal</h1>';
                }
            }
            public function update()
            {
                $nombreTabla = get_class($this);

                $atributos = array();

                foreach ($this as $indice => $valor) {
                    $atributos[$indice] = $valor;
                }

                $query = "UPDATE " . $nombreTabla . " SET ";

                foreach ($atributos as $indice => $valor) {
                    $query = $query . " " . $indice . " = '" . $valor . "', ";
                }

                function endKey($array)
                {

                    end($array);

                    return key($array);
                }

                $query = substr($query, 0, -13) . " WHERE " . endKey($atributos) . " = " . end($atributos) . ";";


                $conexion = new conexion();

                $conn = $conexion->conectar();

                $rs = $conn->prepare($query);
                try {
                    $rs->execute();
                    echo '<div class="alert alert-success" role="alert" id="alert">
                        ¡Actualizar Correctamente!
                        </div>';
                    echo '<h1 style="text-align: center;" id="commit">¡Hecho!</h1>';
                } catch (\Throwable $th) {
                    echo '<div class="alert alert-danger" role="alert" id="alert">
                    ¡Error al Actualizar!
                    </div>';
                    echo '<h1 style="text-align: center;" id="error">¡Ups!, algo salio mal</h1>';
                    echo $th;
                }
            }
            public function delete()
            {
                $nombreTabla = get_class($this);

                $atributos = array();

                foreach ($this as $indice => $valor) {
                    $atributos[$indice] = $valor;
                }

                $query = "UPDATE " . $nombreTabla . " SET ";

                $id = $atributos['id'];

                unset($atributos['id']);

                foreach ($atributos as $indice => $valor) {
                    $query = $query . " " . $indice . " = '" . $valor . "', ";
                }

                $query = substr($query, 0, -2) ." WHERE id = " . $id. ";";

                $conexion = new conexion();

                $conn = $conexion->conectar();

                $rs = $conn->prepare($query);
                try {
                    $rs->execute();
                    echo '<div class="alert alert-success" role="alert" id="alert">
                        ¡Actualizar Correctamente!
                        </div>';
                    echo '<h1 style="text-align: center;" id="commit">¡Hecho!</h1>';
                } catch (\Throwable $th) {
                    echo '<div class="alert alert-danger" role="alert" id="alert">
                    ¡Error al Actualizar!
                    </div>';
                    echo '<h1 style="text-align: center;" id="error">¡Ups!, algo salio mal</h1>';
                    echo $th;
                }
            }
        }
        ?>


    </div>
    <script>
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 0);
    </script>
</body>

</html>