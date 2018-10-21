<?php
/*
    Clase para manejar los pedidos ajax a la base de datos
*/

require_once 'model/PDORepository.php';

class AjaxRepository extends PDORepository {

  public function obtenerPartidos() {
    if( null !== ($db = $this->conectarse())) {
      $sql = "SELECT * FROM partido";
      $query = $db->prepare($sql);
      $query->execute(array());
      return $query->fetchAll();
    } else {
      return null;
    }
  }

  public function obtenerRegionSanitaria($partido) {
    if( null !== ($db = $this->conectarse())) {
      $sql = "SELECT region_sanitaria_id FROM partido WHERE id = ?";
      $query = $db->prepare($sql);
      $query->execute(array($partido));
      return $query->fetch();
    } else {
      return null;
    }
  }

  public function localidadesDePartido($id) {
    if( null !== ($db = $this->conectarse())) {
      $sql = "SELECT l.nombre, l.id FROM localidad l INNER JOIN partido p ON (p.id = l.partido_id) WHERE p.id = ?";
      $query = $db->prepare($sql);
      $query->execute(array($id));
      return $query->fetchAll();
    } else {
      return null;
    }
  }
}

?>
