<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'model/SesionRepository.php';
require_once 'controller/RooterController.php';

class SessionController extends Controller{

    public function login(){
        if(SesionRepository::singleton()->iniciarSesion($_POST['usuario'], $_POST['contrasena'])){
            RooterController::singleton()->redireccionar('');
        } else {
            echo 'Logueo Incorrecto';
        }
    }

    public function redireccionarLogin(){
        $view = new Login();
        $view->show();
    }

    public function closeSession() {
        if(isset($_SESSION["id"]) ) {
            $view = new Home();
            $view->showHome();
        } else { echo 'No esta inciada ninguna session';}
    }

}
