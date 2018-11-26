<?php

require_once 'model/PDORepository.php';

class InstitucionesRepository extends PDORepository {

    public function getInstituciones() {
        if( null !== ($db = $this->conectarse())) {
          $query = $db->prepare("SELECT * FROM institucion");
          $query->execute();
          return $query->fetchAll();
        } else {
          return null;
        }
      }
}

?>