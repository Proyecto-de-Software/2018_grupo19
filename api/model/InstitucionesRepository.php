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

    public function getInstitucionById($id) {
        if( null !== ($db = $this->conectarse())) {
          $query = $db->prepare("SELECT * FROM institucion where id = ?");
          $query->execute(array($id));
          return $query->fetchAll();
        } else {
          return null;
        }
    }


    public function getInstitucionesByRegion($idRegion) {
        if( null !== ($db = $this->conectarse())) {
          $query = $db->prepare("SELECT * FROM institucion where region_sanitaria_id = ?");
          $query->execute(array($idRegion));
          return $query->fetchAll();
        } else {
          return null;
        }
    }

}

?>