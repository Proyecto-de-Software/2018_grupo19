<?php

require 'model/SesionRepository.php';

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
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);
    $template = $twig->load('index.html');
    echo $template->render();
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
