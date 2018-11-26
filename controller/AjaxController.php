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

    public function obtenerGeneros() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerGeneros()));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function obtenerTiposDeDocumento() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerTiposDeDocumento()));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function obtenerObrasSociales() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerObrasSociales()));
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

    public function obtenerMotivos() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerMotivos()));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function obtenerPacientePorHistoria() {
        try {
            echo (json_encode(AjaxRepository::singleton()->obtenerPacientePorHistoria($_GET['nro_historia'])));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }
}
?>
