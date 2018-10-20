<?php

require_once 'model/PDORepository.php';

class PacientesRepository extends PDORepository {

    public function crearPaciente($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id) {
      if( null !== ($db = $this->conectarse())) {
        $sql = "INSERT INTO paciente (id, apellido, nombre, fecha_nac, lugar_nac, localidad_id, region_sanitaria_id, domicilio, genero_id, tiene_documento, tipo_doc_id, numero, tel, nro_historia_clinica, nro_carpeta, obra_social_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute(array($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id));
        return true;
      } else {
        return null;
      }
    }

    public function actualizarPaciente($id, $apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id) {
      if( null !== ($db = $this->conectarse())) {
        $sql = "UPDATE paciente SET apellido=?, nombre=?, fecha_nac=?, lugar_nac=?, localidad_id=?, region_sanitaria_id=?, domicilio=?, genero_id=?, tiene_documento=?, tipo_doc_id=?, numero=?, tel=?, nro_historia_clinica=?, nro_carpeta=?, obra_social_id=? WHERE paciente.id = $id";
        $query = $db->prepare($sql);
        $query->execute(array($apellido, $nombre, $fecha_nac, $lugar_nac, $localidad_id, $region_sanitaria_id, $domicilio, $genero_id, $tiene_documento, $tipo_doc_id, $numero, $tel, $nro_historia_clinica, $nro_carpeta, $obra_social_id));
        return true;
      } else {
        return null;
      }
    }

    public function pacientes($historia_clinica = null, $apellido = null, $nombre = null, $documento = null, $tipo_doc = null) {
      if( null !== ($db = $this->conectarse())) {
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

        return $query->fetchAll();
      } else {
        return null;
      }
    }

    public function paciente($id) {
      if( null !== ($db = $this->conectarse())) {
        $sql = "SELECT * FROM paciente p WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetch();
      } else {
        return null;
      }
    }

    public function localidadDePartido($id) {
      if( null !== ($db = $this->conectarse())) {
        $sql = "SELECT * FROM localidad l INNER JOIN partido p ON (p.id = l.partido_id) WHERE p.id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        return $query->fetchAll();
      } else {
        return null;
      }
    }
}
