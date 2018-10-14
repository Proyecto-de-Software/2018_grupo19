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
    $view->show();
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
      case 'iniciarSesion':
        $this->iniciarSesion();
        $this->administracion();
        break;
      case 'login':
        $this->login();
        break;
      case 'administracion':
        $this->administracion();
        break;
<<<<<<< HEAD
      case 'busqueda-usuarios':
        $this->busquedaUsuarios();
=======
      case 'administracion-usuarios':
        $this->administracionUsuarios();
>>>>>>> 54f3e0b902df7471234031afdfc8a16da8472b64
        break;
      default:
        $this->home();
        break;
    }
  }
}
