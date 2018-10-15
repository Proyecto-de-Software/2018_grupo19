<?php

require 'model/SesionRepository.php';
require 'views/Login.php';
require 'views/Home.php';
require 'views/Administracion.php';
require_once 'views/BusquedaUsuarios.php';


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
    var_dump($_SESSION);
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

  public function redireccionar($comando){
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
      case 'administracion-usuarios':
        $this->administracionUsuarios();
        break;
      default:
        $this->home();
        break;
    }
  }
}
