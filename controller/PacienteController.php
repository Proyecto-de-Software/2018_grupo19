<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'RooterController.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){
        $view = new BusquedaPacientes();
        $view->show($pacientes);
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
