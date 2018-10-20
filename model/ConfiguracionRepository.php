<?php

require_once 'model/PDORepository.php';

class ConfiguracionRepository extends PDORepository {

  public function actualizarConfiguracion($titulo, $mail, $descripcion, $cantidad, $estadoDelSitio) {
    try {
      $db = $this->conectarse();
      $query = $db->prepare("UPDATE configuracion SET valor = ? WHERE variable = 'titulo'");
      $query->execute(array($titulo));
      $query = $db->prepare("UPDATE configuracion SET valor = ? WHERE variable = 'mail'");
      $query->execute(array($mail));
      $query = $db->prepare("UPDATE configuracion SET valor = ? WHERE variable = 'descripcion'");
      $query->execute(array($descripcion));
      $query = $db->prepare("UPDATE configuracion SET valor = ? WHERE variable = 'cantidad'");
      $query->execute(array($cantidad));
      $query = $db->prepare("UPDATE configuracion SET valor = ? WHERE variable = 'estadoDelSitio'");
      $query->execute(array($estadoDelSitio? 1:0));
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  public function getConfiguracion() {
    try {
      $db = $this->conectarse();
      $query = $db->prepare("SELECT * FROM configuracion");
      $query->execute();
      return $this->parseResultado($query->fetchAll());
    } catch (Exception $e) {
      throw $e;
    }
  }

  private function parseResultado($arreglo) {
    $arregloParseado = array();
    foreach ($arreglo as $key => $value) {
      $arregloParseado[$value[1]] = $value[2];
    }
    return $arregloParseado;
  }

}
