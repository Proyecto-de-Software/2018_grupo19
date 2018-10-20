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

}
