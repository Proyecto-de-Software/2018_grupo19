<?php

require 'model/SesionRepository.php';

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}


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

  private function home(){
    $view = new Home();
    //session_start();
    if(!isset($_SESSION['id'])) {
      $view->showHome();
    } else {
      if($_SESSION['id'] == 1) {
        $view->showHomeAdministrador();
      } else {
        $view->showHomeLogueado();
      }     
    }
  }

  private function iniciarSesion(){
    $conexion=new SesionRepository();
    $conexion->iniciarSesion($_POST['usuario'], $_POST['contrasena']);
  }

  private function login(){
    $view = new Login();
    $view->show();
  }

  private function administracion(){
    $view = new Administracion();
    $view->show();
  }

  private function busquedaUsuarios(){
    $view = new BusquedaUsuarios();
    $view->show();
  }

  private function configuracion(){
    $view = new Configuracion();
    $view->show();
  }

  public function redireccionar($comando){
    session_start();
    switch ($comando) {
      case 'iniciar-sesion':
        $this->iniciarSesion();
        $this->home();
        break;
      case 'login':
        $this->login();
        break;
      case 'administracion':
        $this->administracion();
        break;
      case 'busqueda-usuarios':
        $this->busquedaUsuarios();
        break;
      case 'configuracion':
        $this->configuracion();
        break;
      default:
        $this->home();
        break;
    }
  }
}
