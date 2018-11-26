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

    public function parametrosDeSesion($parametros = array()) {
        return array_merge(array("logueado"=>isset($_SESSION['id']),"username"=>isset($_SESSION['username'])?$_SESSION['username']:null,"administrador"=>isset($_SESSION['administrador'])?$_SESSION['administrador']:null),$parametros);
    }

    public function redireccionarError($error,$descripcion) {
        $view = new PaginaDeError();
        $view->show($this->parametrosDeSesion(array('error_titulo' => $error, 'error_descripcion' => $descripcion)));
    }

    public function home(){
        $view = new Home();
        $view->show($this->parametrosDeSesion());
    }

}
?>
