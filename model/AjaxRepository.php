<?php
/*
Clase para manejar los pedidos ajax a la base de datos
*/

require_once 'model/PDORepository.php';

class AjaxRepository extends PDORepository {

    public function obtenerPartidos() {
        $db = $this->conectarse();
        $sql = "SELECT * FROM partido";
        $query = $db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }

    public function obtenerGeneros() {
        $db = $this->conectarse();
        $sql = "SELECT * FROM genero";
        $query = $db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }

    public function obtenerTiposDeDocumento() {
        $db = $this->conectarse();
        $sql = "SELECT * FROM tipo_documento";
        $query = $db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }

    public function obtenerObrasSociales() {
        $db = $this->conectarse();
        $sql = "SELECT * FROM obra_social";
        $query = $db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }

    public function obtenerRegionSanitaria($partido) {
        $db = $this->conectarse();
        $sql = "SELECT region_sanitaria_id FROM partido WHERE id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($partido));
        return $query->fetch();
    }

    public function localidadesDePartido($id) {
        $db = $this->conectarse();
        $sql = "SELECT l.nombre, l.id FROM localidad l INNER JOIN partido p ON (p.id = l.partido_id) WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetchAll();
    }

    public function obtenerMotivos() {
        $db = $this->conectarse();
        $sql = "SELECT * FROM motivo_consulta";
        $query = $db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }
}

?>
