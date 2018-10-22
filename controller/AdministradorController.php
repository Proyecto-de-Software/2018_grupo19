<?php

/*
**  Controladores relacionados a tareas especificas de un administrador del sitio
*/

require_once 'model/UsuariosRepository.php';
require_once 'model/ConfiguracionRepository.php';
require_once 'controller/SessionController.php';

class AdministradorController extends Controller{

    public function redireccionarSitioEnMantenimiento(){
        $view = new SitioEnMantenimiento();
        $view->show();
    }

    public function redireccionarConfiguracion(){
        try {
            if (UsuariosRepository::singleton()->chequearPermiso('configuracion_update', $_SESSION['id'])) {
                $result = ConfiguracionRepository::singleton()->getConfiguracion();
                $view = new Configuracion();
                $view->show($this->parametrosDeSesion($result));
            }
            else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la configuracion del sitio');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function actualizarConfiguracion(){
        try {
            if (UsuariosRepository::singleton()->chequearPermiso('configuracion_update', $_SESSION["id"]) ){
                ConfiguracionRepository::singleton()->actualizarConfiguracion($_POST["titulo"], $_POST["mail"], $_POST["descripcion"], $_POST["cantidad"], isset($_POST["estadoDelSitio"]));
                RooterController::singleton()->redireccionar('');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la configuracion del sitio');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function sitioHabilitado() {
        try {
            return (1 == ConfiguracionRepository::singleton()->getPaginaEnMantenimiento());
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function hayUnAdministrador() {
        return isset($_SESSION["administrador"]) ? $_SESSION["administrador"]:false;
    }

}
