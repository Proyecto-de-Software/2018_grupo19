<?php

require_once 'model/PDORepository.php';

class ConsultaRepository extends PDORepository {

    public function crearConsulta($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $tratamiento, $acompanamiento) {
        $db = $this->conectarse();
        $sql = "INSERT INTO consulta (id, paciente_id, fecha, motivo_id, derivacion_id, articulacion_con_instituciones, internacion, diagnostico, observaciones, tratamiento_farmacologico_id, acompanamiento_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute(array($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $tratamiento, $acompanamiento));
    }
}

?>