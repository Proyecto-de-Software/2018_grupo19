<?php

/*
**  Controladores relacionados al manejo de pedidos AJAX
*/

require_once 'RooterController.php';
require_once 'model/AjaxRepository.php';

class AjaxController extends Controller{

    public function obtenerPartidos() {
        $partidos = json_encode(AjaxRepository::singleton()->obtenerPartidos());
        if ($partidos != null) {
          echo $partidos;
        } else {
          // Manejo de errores
        }
    }

    public function obtenerRegionSanitaria() {
        $region = json_encode(AjaxRepository::singleton()->obtenerRegionSanitaria($_GET['partido']));
        if ($region != null) {
          echo $region;
        } else {
          // Manejo de errores
        }
    }

    public function obtenerLocalidades() {
      $partidos = json_encode(AjaxRepository::singleton()->localidadesDePartido($_GET['partido']));
      if ($partidos != null) {
        echo $partidos;
      } else {
        // Manejo de errores
      }
    }
}
?>
