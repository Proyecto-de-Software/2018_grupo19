<?php

/* 
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

include 'model/UsuariosRepository.php';

class UsuarioController{

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    public function redireccionarBusquedaUsuarios(){
        if(UsuariosRepository::singleton()->chequearPermiso('users_index', $_SESSION['id'])) {
            $view = new BusquedaUsuarios();
            $view->show();
        } else {
            // Redireccion pantalla de falta de permisos
            echo 'Error de permisos';
        }
    }
}