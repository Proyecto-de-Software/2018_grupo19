<?php

require_once 'model/PDORepository.php';

class ConsultaRepository extends PDORepository {

    public function crearConsulta($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento) {
        $db = $this->conectarse();
        $sql = "INSERT INTO consulta (id, paciente_id, fecha, motivo_id, derivacion_id, articulacion_con_instituciones, internacion, diagnostico, observaciones, tratamiento_farmacologico_id, acompanamiento_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute(array($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento));
    }

    public function actualizarConsulta($id_consulta, $motivo_id, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento) {
        $db = $this->conectarse();
        $sql = "UPDATE consulta SET motivo_id = ?, derivacion_id = ?, articulacion_con_instituciones = ?, internacion = ?, diagnostico = ?, observaciones = ?, tratamiento_farmacologico_id = ?, acompanamiento_id = ? WHERE consulta.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($motivo_id, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento, $id_consulta));
    }

    public function borrarConsulta($id_consulta) {
        $db = $this->conectarse();
        $sql = "DELETE FROM consulta WHERE id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id_consulta));
    }

    public function borrarTodasLasConsultasDelPaciente($id_paciente) {
        $db = $this->conectarse();
        $sql = "DELETE FROM consulta WHERE paciente_id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id_paciente));
    }

    public function consultasDePaciente($id_paciente) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM consulta c INNER JOIN paciente p ON (c.paciente_id = p.id) INNER JOIN motivo_consulta m ON (c.motivo_id = m.id) WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id_paciente));
        return $query->fetchAll();
    }

    public function idConsultasDePaciente($id_paciente) {
        $db = $this->conectarse();
        $sql = "SELECT c.id FROM consulta c INNER JOIN paciente p ON (c.paciente_id = p.id) WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id_paciente));
        return $query->fetchAll();
    }

    public function consultaConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM consulta c INNER JOIN paciente p ON (c.paciente_id = p.id) WHERE c.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function ubicacion($id_consulta) {
        $db = $this->conectarse();
        $sql = "SELECT latitud,longitud FROM consulta c INNER JOIN institucion i ON (c.derivacion_id = i.id) WHERE c.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id_consulta));
        return $query->fetch();
    }
}

?>