<?php

/*
**  Controladores relacionados a tareas especificas de un administrador del sitio
*/

require_once 'model/UsuariosRepository.php';
require_once 'model/ConfiguracionRepository.php';
require_once 'controller/SessionController.php';

class AdministradorController extends Controller{

    public function redireccionarConfiguracion(){
      if (UsuariosRepository::singleton()->chequearPermiso('configuracion_update', $_SESSION['id'])) {
        if ( null !== ($result = ConfiguracionRepository::singleton()->getConfiguracion())) {
          $view = new Configuracion();
          $view->show($this->parametrosDeSesion($result));
        } else {
          echo 'Error en la BD';
        }
      } else {
        echo 'Error en los permisos';
      }
    }

    public function redireccionarSitioEnMantenimiento(){  // Que onda este metodo?
        $view = new SitioEnMantenimiento();
        $view->show($this->parametrosDeSesion());
    }

    public function actualizarConfiguracion(){
      if (UsuariosRepository::singleton()->chequearPermiso('configuracion_update', $_SESSION["id"]) ){
        if (ConfiguracionRepository::singleton()->actualizarConfiguracion($_POST["titulo"], $_POST["mail"], $_POST["descripcion"], $_POST["cantidad"], isset($_POST["estadoDelSitio"]))){
          RooterController::singleton()->redireccionar('');
        } else {
          echo 'No se pudo actualizar los permisos, error en la bd';
        }
      } else {
        echo 'No se tiene permisos';
      }
    }

}
