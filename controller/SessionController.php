<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'model/SesionRepository.php';
require_once 'controller/RooterController.php';

class SessionController extends Controller{

    public function login(){
        try {
            /*SesionRepository::singleton()->iniciarSesion($_POST['usuario'], $_POST['contrasena']); Esto estaba antes
            RooterController::singleton()->redireccionar('');*/
            if(SesionRepository::singleton()->iniciarSesion($_POST['usuario'], $_POST['contrasena'])){
                if(! AdministradorController::singleton()->sitioHabilitado() && !$_SESSION['administrador']) {
                    session_destroy();
                    return false;
                } else {
                    RooterController::singleton()->redireccionar('');
                    return true;
                }
            } else {
                echo 'Logueo Incorrecto';
                return false;
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
