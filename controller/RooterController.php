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

  public function home($logueado = false, $username = null, $administrador = false){
    $view = new Home();
    $view->show(array('logueado'=>$logueado,'username'=>$username,'administrador'=>$administrador));
  }

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

        default:
          $this->home();
          break;

      }

    } else {

      switch ($comando) {

        /*
        ** Session rooter
        */

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
        ** Default
        */

        default:
          $this->home(isset($_SESSION['id']),$_SESSION['username'],$_SESSION['administrador']);
          break;
      }

    }
  }
}
