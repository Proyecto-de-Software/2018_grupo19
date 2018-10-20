<?php

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

abstract class Controller {

  private static $instances;

  // Metodo para acceder al singleton
  public static function singleton() {
    if(!isset($instances)) {
      $instances = array();
    }
    $calledClass = get_called_class();
    if (!isset($instances[$calledClass])) {
        $instances[$calledClass] = new $calledClass();
    }
    return $instances[$calledClass];
  }

  public function home($logueado = false, $username = null, $administrador = false){
    $view = new Home();
    $view->show(array('logueado'=>$logueado,'username'=>$username,'administrador'=>$administrador));
  }

}


?>
