<?php
/*
Clase Abstracta para los metodos de conexion con la BD
*/

abstract class PDORepository {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
      static $instances = array();
      $calledClass = get_called_class();
      if (!isset($instances[$calledClass])) {
          $instances[$calledClass] = new $calledClass();
      }
      return $instances[$calledClass];
    }

    private $dataBase;

    public function conectarse() {
      if (is_null($this->dataBase)) {
        try {
          $this->dataBase = new PDO('mysql:host=localhost;dbname=grupo19', 'grupo19', 'NThlNWI1NWEwYjNi');
          $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          return null;
        }
      }
      return $this->dataBase;
    }

    public function cantidadPorPagina() {
      if( null !== ($db = $this->conectarse())) {
        $query = $db->prepare("SELECT valor FROM configuracion WHERE variable = 'cantidadPorPagina'");
        $query->execute();
        if($query->rowCount() == 1) {
          $fila = $query->fetch();
          return $fila["valor"];
        }
      }
      return null;
    }

}
