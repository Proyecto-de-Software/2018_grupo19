<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'RooterController.php';
require_once 'model/PacientesRepository.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){
        try {
            if (UsuariosRepository::singleton()->chequearPermiso('paciente_index', $_SESSION["id"])) {
                $result = PacientesRepository::singleton()->pacientes(isset( $_GET['nro_historia_clinica'])?$_GET['nro_historia_clinica']:null , isset($_GET['apellido'])?$_GET['apellido']:null , isset($_GET['nombre'])?$_GET['nombre']:null , isset($_GET['dni'])?$_GET['dni']:null,isset($_GET['tipo_doc_id'])?$_GET['tipo_doc_id']:null);
                $view = new BusquedaPacientes();
                $view->show($this->parametrosDeSesion(array('resultados'=>$result)));
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la busqueda de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function redireccionarCreacionPacientes(){
        try {
            if (UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
                $view = new CreacionPaciente();
                $view->show($this->parametrosDeSesion());
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la creacion de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function insertarPaciente(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
                PacientesRepository::singleton()->crearPaciente($_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], isset($_POST['tiene_documento']), $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
                RooterController::singleton()->redireccionar('busqueda-pacientes');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para crear pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function actualizarPaciente(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
                PacientesRepository::singleton()->actualizarPaciente($_GET['id'], $_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], $_POST['tiene_documento'], $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
                RooterController::singleton()->redireccionar('busqueda-pacientes');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function redireccionarInfoPaciente(){
        try {
            $paciente = PacientesRepository::singleton()->infoPaciente($_GET['id']);
            $view = new InfoPaciente();
            $view->show($this->parametrosDeSesion(array('paciente' => $paciente)));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }
}
