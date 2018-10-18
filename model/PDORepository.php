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
          //Manejar error de DB
          echo "Error: " . $e->getMessage() . "<br/>";
          die();
        }
      }
      return $this->dataBase;
    }

}
