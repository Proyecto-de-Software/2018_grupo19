<?php

require_once 'model/PDORepository.php';

class ConsultaRepository extends PDORepository {

    public function crearConsulta($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento) {
        $db = $this->conectarse();
        $sql = "INSERT INTO consulta (id, paciente_id, fecha, motivo_id, derivacion_id, articulacion_con_instituciones, internacion, diagnostico, observaciones, tratamiento_farmacologico_id, acompanamiento_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute(array($paciente, $fecha, $motivo, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento));
    }

    public function actualizarConsulta($id_consulta, $motivo_id, $derivacion, $articulacion, $internacion, $diagnostico, $observaciones, $tratamiento, $acompanamiento) {
        $db = $this->conectarse();
        $sql = "UPDATE consulta SET motivo_id = ?, derivacion_id = ?, articulacion_con_instituciones = ?, internacion = ?, diagnostico = ?, observaciones = ?, tratamiento_farmacologico_id = ?, acompanamiento_id = ? WHERE id = ?";
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
}

?>