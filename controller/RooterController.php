<?php

require_once 'controller/Controller.php';
require_once 'controller/SessionController.php';
require_once 'controller/AdministradorController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/PacienteController.php';

/*
    Clase que se encarga del rooteo
*/

class RooterController extends Controller{

  public function redireccionar($comando){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

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
        ** Session rooter
        */

        case 'iniciar-sesion':
          //MODIFICAR: DEBERIA APARECER QUE LA SESSION ESTA INICIADA
          echo 'Session ya iniciada';
          break;

        case 'login':
          //MODIFICAR: DEBERIA APARECER QUE LA SESSION ESTA INICIADA
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

        case 'creacion-pacientes':
          PacienteController::singleton()->redireccionarCreacionPacientes();
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
