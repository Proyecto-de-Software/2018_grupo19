<?php

require_once 'controller/Controller.php';
require_once 'controller/SessionController.php';
require_once 'controller/AdministradorController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/PacienteController.php';
require_once 'controller/AjaxController.php';

/*
    Clase que se encarga del rooteo
*/

class RooterController extends Controller{

  public function verificarSitioHabilitado($comando){
    if(! AdministradorController::singleton()->sitioHabilitado()) {
      
      if (! AdministradorController::singleton()->hayUnAdministrador() ) {
        if( isset($_POST['usuario']) && isset($_POST['contrasena'])) {
          if(SessionController::singleton()->login()){
            return true;
          } else {
            return false;
          }
        
        }else if ( $comando == 'login' ){
          echo 'b';
          return true;
        } else {
          echo 'a';
          return false;
        }
      
      } else { return true;}
    } else { return true; }
  }

  public function redireccionar(){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //session_destroy();

    if(! $this->verificarSitioHabilitado($comando)) {
      AdministradorController::singleton()->redireccionarSitioEnMantenimiento();
      return;
    }

    if(!isset($_SESSION["id"])) {

      switch ($comando) {

        case 'iniciar-sesion':
          SessionController::singleton()->login();
          break;

        case 'login':
          SessionController::singleton()->redireccionarLogin();
          break;

        default:
          $this->home();
          break;

      }

    } else {

      switch ($comando) {

        /*
        ** Session rooter
        */

        case 'cerrar-sesion':
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

        case 'cambio-configuracion':
          AdministradorController::singleton()->actualizarConfiguracion();
          break;

        /*
        ** Usuarios rooter
        */

        case 'busqueda-usuarios':
          UsuarioController::singleton()->redireccionarBusquedaUsuarios();
          break;

        case 'creacion-usuario':
          UsuarioController::singleton()->redireccionarCreacionUsuario();
          break;

        case 'insertar-usuario':
          UsuarioController::singleton()->insertarUsuario();
          break;

        case 'edicion-usuario':
          UsuarioController::singleton()->redireccionarEdicionUsuario();
          break;

        case 'borrar-usuario':
          UsuarioController::singleton()->borrarUsuario();
          break;

        case 'info-usuario':
          UsuarioController::singleton()->redireccionarInfoUsuario();
          break;

        case 'actualizar-usuario':
          UsuarioController::singleton()->actualizarUsuario();
          break;

        /*
        ** Pacientes rooter
        */

        case 'busqueda-pacientes':
          PacienteController::singleton()->redireccionarBusquedaPacientes();
          break;

        case 'creacion-paciente':
          PacienteController::singleton()->redireccionarCreacionPacientes();
          break;

        case 'insertar-paciente':
          PacienteController::singleton()->insertarPaciente();
          break;       
        
        case 'info-paciente':
          PacienteController::singleton()->redireccionarInfoPaciente();
          break;

        /*
        ** Pedidos AJAX
        */

        case 'obtener-partidos':
          AjaxController::singleton()->obtenerPartidos();
          break;

        case 'obtener-region-sanitaria':
          AjaxController::singleton()->obtenerRegionSanitaria();
          break;

        case 'obtener-localidades':
          AjaxController::singleton()->obtenerLocalidades();
          break;

        /*
        ** Default
        */

        default:
          RooterController::singleton()->home();
          break;
      }

    }
  }
}
