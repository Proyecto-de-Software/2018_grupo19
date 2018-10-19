<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require 'model/SesionRepository.php';

foreach (glob("views/*.php") as $vista)
{
    require_once $vista;
}

class SessionController {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    public function redireccionarHome(){
        $view = new Home();
        if(!isset($_SESSION['id'])) {
          $view->showHome();
        } else {
          //Chequear administrador
          if($_SESSION['id'] == 1) {
            $view->showHomeAdministrador();
          } else {
            $view->showHomeLogueado();
          }
        }
      }

    public function login(){
        $conexion = new SesionRepository();
        if($conexion->iniciarSesion($_POST['usuario'], $_POST['contrasena'])){
            $this->redireccionarHome();
        } else {
            // Codigo en caso de inicio incorrecto
        }
    }

    public function redireccionarLogin(){
        $view = new Login();
        $view->show();
    }

    public function closeSession() {
        $view = new Home();
        $view->showHome();
    }

    public function redireccionarLoginObligatorio() {
        // Nothing
    }

}
