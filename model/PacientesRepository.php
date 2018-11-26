<?php

require_once 'model/PDORepository.php';
require_once 'model/ConsultaRepository.php';

class PacientesRepository extends PDORepository {

    public function crearPaciente($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id) {
        $db = $this->conectarse();
        $sql = "INSERT INTO paciente (id, apellido, nombre, fecha_nac, lugar_nac, localidad_id, region_sanitaria_id, domicilio, genero_id, tiene_documento, tipo_doc_id, numero, tel, nro_historia_clinica, nro_carpeta, obra_social_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute(array($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id));
    }

    public function verificarHistoriaClinica($numero) {
        $db = $this->conectarse();
        $query = $db->prepare("SELECT * FROM paciente WHERE nro_historia_clinica = ?");
        $query->execute(array($numero));
        return ($query->rowCount() == 0);
    }

    public function actualizarPaciente($id, $apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id) {
        $db = $this->conectarse();
        $sql = "UPDATE paciente SET apellido=?, nombre=?, fecha_nac=?, lugar_nac=?, localidad_id=?, region_sanitaria_id=?, domicilio=?, genero_id=?, tiene_documento=?, tipo_doc_id=?, numero=?, tel=?, nro_historia_clinica=?, nro_carpeta=?, obra_social_id=? WHERE paciente.id = $id";
        $query = $db->prepare($sql);
        $query->execute(array($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id));
    }

    public function pacientes($historia_clinica = null, $apellido = null, $nombre = null, $documento = null, $tipo_doc = null, $paginaActual = 0) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM paciente p WHERE TRUE";
        //El WHERE TRUE es para despues siempre concatenar a la consulta con ANDs
        $parametros = array();

        if ($historia_clinica != null){
            $sql = $sql." AND p.nro_historia_clinica = ?";
            array_push($parametros,$historia_clinica);
        } else {
            if ($apellido != null){
                $sql = $sql." AND p.apellido LIKE ?";
                array_push($parametros,$apellido.'%');
            }
            if ($nombre != null){
                $sql = $sql." AND p.nombre LIKE ?";
                array_push($parametros,$nombre.'%');
            }
            if ($documento != null){
                $sql = $sql." AND p.numero LIKE ?";
                array_push($parametros,$documento.'%');
            }
            if ($tipo_doc != null){
                $sql = $sql." AND p.tipo_doc_id = ?";
                array_push($parametros,$tipo_doc.'%');
            }
        }
        $query = $db->prepare($sql);
        $query->execute($parametros);
        $cantidadPaginas = ceil( $query->rowCount() / $this->cantidadPorPagina() );

        $primero = ($paginaActual * $this->cantidadPorPagina() );
        $sql = $sql . " LIMIT " . $primero . ', ' . (($this->cantidadPorPagina()) );
        $query = $db->prepare($sql);
        $query->execute($parametros);
        $result = array("cantidadTotal" => $cantidadPaginas, "pacientes" => $query->fetchAll());
        return $result;
    }

    public function paciente($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM paciente p WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function esNN($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM paciente p WHERE p.id = ? AND p.apellido = 'NN' AND p.nombre = 'NN'";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->rowCount();
    }

    public function infoPaciente($id) {
        $paciente = $this->paciente($id);
        $paciente['localidad_nombre'] = $this->localidadConId($paciente['localidad_id'])['nombre'];
        $paciente['partido_nombre'] = $this->partidoDe($paciente['localidad_id'])['nombre'];
        $paciente['partido_id'] = $this->partidoDe($paciente['localidad_id'])['id'];
        $paciente['genero_nombre'] = $this->generoConId($paciente['genero_id'])['nombre'];
        $paciente['tipo_doc_nombre'] = $this->tipoDocConId($paciente['tipo_doc_id'])['nombre'];
        $paciente['obra_social_nombre'] = $this->obraSocialConId($paciente['obra_social_id'])['nombre'];
        $paciente['region_sanitaria_nombre'] = $this->regionSanitariaConId($paciente['region_sanitaria_id'])['nombre'];
        return $paciente;
    }

    public function borrarPaciente($id) {
        ConsultaRepository::singleton()->borrarTodasLasConsultasDelPaciente($id);
        $db = $this->conectarse();
        $sql = "DELETE FROM paciente WHERE id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
    }

    // ** Funciones para obtener la info de un paciente

    public function localidadConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM localidad l WHERE l.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function partidoDe($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM localidad l INNER JOIN partido p ON(p.id = l.partido_id) WHERE l.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function generoConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM genero g WHERE g.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function tipoDocConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM tipo_documento td WHERE td.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function obraSocialConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM obra_social os WHERE os.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function regionSanitariaConId($id) {
        $db = $this->conectarse();
        $sql = "SELECT * FROM region_sanitaria rs WHERE rs.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function pacienteConHistoria($historia){
        $db = $this->conectarse();
        $sql = "SELECT id FROM paciente p WHERE p.nro_historia_clinica = ?";
        $query = $db->prepare($sql);
        $query->execute(array($historia));
        return $query->fetch();
    }

    public function ubicacionDeConsultas($id){
        $consultas = ConsultaRepository::singleton()->idConsultasDePaciente($id);
        return array_map(ConsultaRepository::singleton()->ubicacion(),$consultas);
    }

}
