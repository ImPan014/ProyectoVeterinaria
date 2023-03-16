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

        $query = substr($query, 0, -1) . " );";

        $conexion = new conexion();

        $conn = $conexion->conectar();

        $rs = $conn->prepare($query);
        var_dump($query);
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

        $id = $atributos['id'];

        unset($atributos['id']);

        foreach ($atributos as $indice => $valor) {
            $query = $query . " " . $indice . " = '" . $valor . "', ";
        }

        $query = substr($query, 0, -2) . " WHERE id = " . $id . ";";

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

        $query = substr($query, 0, -2) . " WHERE id = " . $id . ";";

        $conexion = new conexion();

        $conn = $conexion->conectar();

        $rs = $conn->prepare($query);
        try {
            $rs->execute();
            echo '<div class="alert alert-success" role="alert" id="alert">
                        ¡Dado de baja Correctamente!
                        </div>';
            echo '<h1 style="text-align: center;" id="commit">¡Hecho!</h1>';
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" role="alert" id="alert">
                    ¡Error al dar de baja!
                    </div>';
            echo '<h1 style="text-align: center;" id="error">¡Ups!, algo salio mal</h1>';
            echo $th;
        }
    }
}
