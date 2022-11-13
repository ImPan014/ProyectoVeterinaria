<?php

class conexion
{

  public $user = "root";
  public $password = "";

  public function conectar()
  {

    try {

      $conn = new PDO('mysql:host=localhost;dbname=empresa', $this->user, $this->password);
      echo '<div class="alert alert-success" role="alert" id="alert">
     Conectado Correctamente!
   </div>';
      return $conn;
    } catch (\Throwable $th) {
      echo '<div class="alert alert-danger" role="alert" id="alert" >
     Error al conectar!
   </div>' . $th;
    }
  }
}
