<?php

/*
**  Controladores relacionados al manejo de pedidos AJAX
*/

require_once 'RooterController.php';
require_once 'model/AjaxRepository.php';

class AjaxController extends Controller{

    public function obtenerPartidos() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerPartidos()));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function obtenerRegionSanitaria() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerRegionSanitaria($_GET['partido'])));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function obtenerLocalidades() {
        try {
            echo (json_encode(AjaxRepository::singleton()->localidadesDePartido($_GET['partido'])));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }
}
?>
