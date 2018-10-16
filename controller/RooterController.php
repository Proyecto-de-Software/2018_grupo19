<?php

require 'controller/SessionController.php';
require 'controller/AdministradorController.php';


/*
    Clase que se encarga del rooteo
*/

class RooterController {

  private static $singleton;

  public static function singleton(){
    if(!isset(self::$singleton)){
      self::$singleton = new self();
    }
    return self::$singleton;
  }

  public function redireccionar($comando){

    session_start();
    
    switch ($comando) {
      
      /*
      ** Session rotter
      */

      case 'iniciar-sesion':
        SessionController::singleton()->login();
        break;
      
      case 'login':
        SessionController::singleton()->redireccionarLogin();
        break;

      case 'cerrar-session':
        SessionController::singleton()->closeSession();
        break;

      /*
      ** Administrador rooter
      */
      
      case 'configuracion':
        AdministradorController::singleton()->redireccionarConfiguracion();
        break;
      
      case 'sitio-en-mantenimiento':
        AdministradorController::singleton()->redireccionarSitioEnMantenimiento();
        break;

      /*
      ** Usuarios rooter
      */ 

      case 'busqueda-usuarios':
        UsuarioController::singleton()->redireccionarBusquedaUsuarios();
        break;

      /*
      ** Default
      */
      
      default:
        SessionController::singleton()->redireccionarHome();
        break;
    }
  }
}
