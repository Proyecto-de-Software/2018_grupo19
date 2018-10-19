<?php

/*
**  Controladores relacionados a tareas especificas de un administrador del sitio
*/

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

require_once 'model/UsuariosRepository.php';
require_once 'model/ConfiguracionRepository.php';
require_once 'controller/SessionController.php';

class AdministradorController {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

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
