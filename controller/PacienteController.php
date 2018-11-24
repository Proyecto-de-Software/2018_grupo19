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
                $result = PacientesRepository::singleton()->pacientes(isset( $_GET['nro_historia_clinica'])?$_GET['nro_historia_clinica']:null , isset($_GET['apellido'])?$_GET['apellido']:null , isset($_GET['nombre'])?$_GET['nombre']:null , isset($_GET['dni'])?$_GET['dni']:null,isset($_GET['tipo_doc_id'])?$_GET['tipo_doc_id']:null, isset($_GET["pagina-actual"]) ? ($_GET['pagina-actual'] - 1):0);

                $view = new BusquedaPacientes();
                $view->show($this->parametrosDeSesion(array('resultados'=>$result['pacientes'], 'paginaActual' => isset($_GET['pagina-actual']) ? $_GET['pagina-actual']:1, 'cantidadPaginas' => $result["cantidadTotal"], 'nroHistoriaClinica' => isset($_GET['nro_historia_clinica'])?$_GET['nro_historia_clinica']:null, 'nombre' => isset($_GET['nombre'])?$_GET['nombre']:null, 'apellido' => isset($_GET['apellido'])?$_GET['apellido']:null, 'dni' => isset($_GET['dni'])?$_GET['dni']:null, 'tipoDocId' => isset($_GET['tipo_doc_id'])?$_GET['tipo_doc_id']:null )));
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la busqueda de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function redireccionarCreacionPacientes($nn = false){
        try {
            if (UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
                $view = $nn? new CreacionPacienteNN() : new CreacionPaciente();
                $view->show($this->parametrosDeSesion());
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la creacion de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function insertarPaciente($nn = false){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_new', $_SESSION["id"])) {
                if(PacientesRepository::singleton()->verificarHistoriaClinica($_POST["nro_historia_clinica"])) {
                    if ($nn) {
                        PacientesRepository::singleton()->crearPaciente('NN', 'NN', '0000-00-00', null, '1', '1', '', '3', '0', '1', '0', '0', $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], '1');
                    } else {
                        PacientesRepository::singleton()->crearPaciente($_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], isset($_POST['tiene_documento']), $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
                    }
                    RooterController::singleton()->redireccionar('creacion-consulta');
                } else {
                    $this->redireccionarError('Error en la creacion', 'El numero de historia clinica ya fue ingresado con anterioridad en el sistema');
                }
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para crear pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function actualizarPaciente(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_update', $_SESSION["id"])) {
                PacientesRepository::singleton()->actualizarPaciente($_GET['id'], $_POST['apellido'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['lugar_nac'], $_POST['localidad_id'], $_POST['region_sanitaria_id'], $_POST['domicilio'], $_POST['genero_id'], isset($_POST['tiene_documento']), $_POST['tipo_doc_id'], $_POST['numero'], $_POST['tel'], $_POST['nro_historia_clinica'], $_POST['nro_carpeta'], $_POST['obra_social_id']);
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
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_show', $_SESSION["id"])) {
                $paciente = PacientesRepository::singleton()->infoPaciente($_GET['id']);
                $view = new InfoPaciente();
                $view->show($this->parametrosDeSesion(array('paciente' => $paciente)),PacientesRepository::singleton()->esNN($_GET['id']));                
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function redireccionarEditarPaciente(){
        try {
            $paciente = PacientesRepository::singleton()->infoPaciente($_GET['id']);
            $view = new EdicionPaciente();
            $view->show($this->parametrosDeSesion(array('paciente' => $paciente)));
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }


    public function borrarPaciente() {
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('paciente_destroy', $_SESSION['id'])) {
                $paciente = PacientesRepository::singleton()->borrarPaciente($_GET['id']);
                RooterController::singleton()->redireccionar('busqueda-pacientes');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }
}
