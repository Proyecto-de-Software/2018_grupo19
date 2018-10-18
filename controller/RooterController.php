<?php

require 'controller/SessionController.php';
require 'controller/AdministradorController.php';
require 'controller/UsuarioController.php';


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
    
    if(!isset($_SESSION["id"])) {

      switch ($comando) {

        case 'iniciar-sesion':
          SessionController::singleton()->login();
          break;
      
        case 'login':
          SessionController::singleton()->redireccionarLogin();
          break;

        case '':
          SessionController::singleton()->redireccionarHome();
          break;

        default:
          SessionController::singleton()->redireccionarLoginObligatorio();
          break;

      }

    } else {

      switch ($comando) {
      
        /*
        ** Session rotter
        */
  
        case 'iniciar-sesion':
          // MODIFICAR: DEBERIA APARECER QUE LA SESSION ESTA INICIADA
          echo 'Session ya iniciada';
          break;
      
        case 'login':
          // MODIFICAR: DEBERIA APARECER QUE LA SESSION ESTA INICIADA
          echo 'Session ya iniciada';
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

        case '':
          SessionController::singleton()->redireccionarHome();
          break;
        
        default:
          // MODIFICAR: ACA DEBERIA TIRAR ERROR
          SessionController::singleton()->redireccionarHome();
          break;
      }

    }
  }
}
