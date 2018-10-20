<?php

/*
**  Controladores relacionados a tareas especificas de un administrador del sitio
*/

require_once 'model/UsuariosRepository.php';
require_once 'model/ConfiguracionRepository.php';
require_once 'controller/SessionController.php';

class AdministradorController extends Controller{

    public function redireccionarConfiguracion(){
        $view = new Configuracion();
        $view->show(ConfiguracionRepository::singleton()->getConfiguracion());
    }

    public function redireccionarSitioEnMantenimiento(){  // Que onda este metodo?
        $view = new SitioEnMantenimiento();
        $view->show();
    }

    public function actualizarConfiguracion(){
      if ((true) || (UsuariosRepository::singleton()->chequearPermiso('configuracion_update', $_SESSION["id"])) ){
        if (ConfiguracionRepository::singleton()->actualizarConfiguracion($_POST["titulo"], $_POST["mail"], $_POST["descripcion"], $_POST["cantidad"], isset($_POST["estadoDelSitio"]))){
          SessionController::singleton()->redireccionarHome();
        } else {
          SessionController::singleton()->redireccionarHome();
        }
      }
    }

}
