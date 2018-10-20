<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'RooterController.php';
require_once 'model/PacientesRepository.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){
        $view = new BusquedaPacientes();
        $view->show(PacientesRepository::singleton()->pacientes(isset($_GET['nro_historia_clinica'])?$_GET['nro_historia_clinica']:null,isset($_GET['apellido'])?$_GET['apellido']:null,isset($_GET['nombre'])?$_GET['nombre']:null,isset($_GET['dni'])?$_GET['dni']:null,isset($_GET['tipo_doc_id'])?$_GET['tipo_doc_id']:null));
    }

    public function redireccionarCreacionPacientes(){
      $view = new CreacionPaciente();
      $view->show();
    }

    public function insertarPaciente(){
      PacientesRepository::singleton()->crearPaciente($_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], $_POST['tiene_documento'], $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
      RooterController::singleton()->redireccionar('busqueda-usuarios');
    }

    public function actualizarPaciente(){
      PacientesRepository::singleton()->actualizarPaciente($_GET['id'], $_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], $_POST['tiene_documento'], $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
      RooterController::singleton()->redireccionar('busqueda-usuarios');
    }

}
