<?php

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

abstract class Controller {

  private static $singleton;

  // Metodo para acceder al singleton
  public static function singleton() {
    static $instances = array();
    $calledClass = get_called_class();
    if (!isset($instances[$calledClass])) {
        $instances[$calledClass] = new $calledClass();
    }
    return $instances[$calledClass];
  }

}


?>
