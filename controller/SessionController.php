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
        $view->show($this->parametrosDeSesion());
    }

    public function closeSession() {
        if(isset($_SESSION["id"]) ) {
            session_destroy();
            RooterController::singleton()->redireccionar('');
        } else { echo 'No esta inciada ninguna session';}
    }

}
