<?php
/*
    Clase Abstracta para los metodos de conexion con la BD
*/

class PDORepository {

    private $dataBase;

    public function conectarse() {
      if (is_null($this->dataBase)) {
        try {
          $this->dataBase = new PDO('mysql:host=localhost;dbname=grupo19', 'grupo19', 'NThlNWI1NWEwYjNi');
        } catch (PDOException $e) {
          return null;
        }
      }
      return $this->dataBase;
    }

    public function cantidadPorPagina() {
      $db = $this->conectarse();
      if(isset($db)) {
        $query = $db->prepare("SELECT valor FROM configuracion WHERE variable = 'cantidadPorPagina'");
        $query->execute();
        if($query->rowCount() == 1) {
          $fila = $query->fetch();
          return $fila["valor"];
        }
      } else {
        // No se pudo conectar a la bd
      }
    }

}
