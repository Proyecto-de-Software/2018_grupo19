<?php

/*
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

require_once 'model/UsuariosRepository.php';

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
            $view->show(UsuariosRepository::singleton()->usuarios());

            /* usuarios hardcodeados para pruebas 

            $blas = new Usuario(0,'blasbutera69@gmail.com','blas', true, '10/10/2018','10/10/2019','Blas','Butera');
            $fede = new Usuario(1,'federicodicla@gmail.com','fede', true, '10/10/2018','10/10/2019','Federico','Diclaudio');
            $pedro = new Usuario(2,'pedrodalb@gmail.com','pedro', true, '10/10/2018','10/10/2019','Pedro','Dalbianco');
            $usuarios = array ($blas, $fede, $pedro);


            //$view->show($usuarios);*/

        } else {
            // Redireccion pantalla de falta de permisos
            echo 'Error de permisos';
        }
    }

    public function redireccionarCreacionUsuario(){
        $view = new CreacionUsuario();
        $view->show();
    }
}
