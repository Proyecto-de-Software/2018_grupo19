<?php

/* 
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

class UsuarioController {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    public function redireccionarBusquedaUsuarios(){
        $view = new BusquedaUsuarios();
        $view->show();
    }
}