<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'RooterController.php';
require_once 'model/PacientesRepository.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){
      if (UsuariosRepository::singleton()->chequearPermiso('paciente_index', $_SESSION["id"])) {
        if(null != ($result = PacientesRepository::singleton()->pacientes(isset($_GET['nro_historia_clinica'])?$_GET['nro_historia_clinica']:null,isset($_GET['apellido'])?$_GET['apellido']:null,isset($_GET['nombre'])?$_GET['nombre']:null,isset($_GET['dni'])?$_GET['dni']:null,isset($_GET['tipo_doc_id'])?$_GET['tipo_doc_id']:null)) ) {
          $view = new BusquedaPacientes();
          $view->show($result);
        } else { echo 'error en la bd'; }
      } else  { echo 'error en los permisos'; }
    }

    public function redireccionarCreacionPacientes(){
      if (UsuariosRepository::singleton()->chequearPermiso('paciente_index', $_SESSION["id"])) {
        $view = new CreacionPaciente();
        $view->show();
      } else {
        echo 'no se tienen permisos';
      }
    }

    public function insertarPaciente(){
      if(UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
        if(null !== PacientesRepository::singleton()->crearPaciente($_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], $_POST['tiene_documento'], $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id'])) {
          RooterController::singleton()->redireccionar('busqueda-pacientes');
        } else { echo 'error en la bd'; }
      } else { echo 'error de permisos'; }
    }

    public function actualizarPaciente(){
      if(UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
        if(null !== PacientesRepository::singleton()->actualizarPaciente($_GET['id'], $_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], $_POST['tiene_documento'], $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']) ) {
          RooterController::singleton()->redireccionar('busqueda-pacientes');
        } else { echo 'error en la bd'; }
      } else { echo 'error de permisos'; }
    }

}
