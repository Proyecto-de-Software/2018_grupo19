<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'model/SesionRepository.php';
require_once 'controller/RooterController.php';

class SessionController extends Controller{

    public function login(){
        try {
            SesionRepository::singleton()->iniciarSesion($_POST['usuario'], $_POST['contrasena']);
            RooterController::singleton()->redireccionar('');
        } catch (Exception $e) {
            $this->redireccionarError('No se pudo iniciar sesion', $e->getMessage());
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
