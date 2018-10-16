<?php

/* 
**  Controladores relacionados a tareas especificas de un administrador del sitio
*/

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

class AdministradorController {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    public function redireccionarConfiguracion(){
        $view = new Configuracion();
        $view->show();
    }

    public function redireccionarSitioEnMantenimiento(){  // Que onda este metodo?
        $view = new SitioEnMantenimiento();
        $view->show();
    }
    
}