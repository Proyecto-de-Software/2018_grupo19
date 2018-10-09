<?php

require 'model/SesionRepository.php';
require 'views/Home.php';

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

  public function redireccionar($comando){
    switch ($comando) {
      case 'iniciarSesion':
        $this->iniciarSesion();
        $this->home();
        break;
      default:
        $this->home();
        break;
    }
  }

}
