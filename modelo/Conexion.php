<?php

class Conexion {

  public function conectarse() {
    try {
      $dataBase = new PDO('mysql:host=localhost;dbname=grupo19', 'grupo19', 'NThlNWI1NWEwYjNi');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}

?>
