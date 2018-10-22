<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'model/UsuariosRepository.php';
require_once 'controller/RooterController.php';

class SessionController extends Controller{

    public function login(){
        try {
            $usuario = UsuariosRepository::singleton()->usuarioContrasena($_POST['usuario'], $_POST['contrasena']);
            if ($usuario['activo']) {
                $_SESSION['id'] = $usuario["id"];
                $_SESSION['username'] = $usuario['username'];
                $_SESSION['activo'] = $usuario['activo'];
                $_SESSION['first_name'] = $usuario['first_name'];
                $_SESSION['last_name'] = $usuario['last_name'];
                $_SESSION['administrador'] = UsuariosRepository::singleton()->isAdministrador($usuario["id"]);
            } else {
                if(AdministradorController::singleton()->sitioHabilitado()) {
                    $this->redireccionarError('No se pudo iniciar sesion', "El usuario con el que intenta acceder se encuentra bloqueado");
                }
                return false;
            }
            if(! AdministradorController::singleton()->sitioHabilitado() && !$_SESSION['administrador']) {
                session_destroy();
                return false;
            } else {
                if (! (! AdministradorController::singleton()->sitioHabilitado() && $_SESSION['administrador'])){
                    RooterController::singleton()->redireccionar('');   
                }
                return true;
            }
        } catch (Exception $e) {
            if(AdministradorController::singleton()->sitioHabilitado()) {
                $this->redireccionarError('No se pudo iniciar sesion', $e->getMessage());
            }
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
        } else {
            $this->redireccionarError('Error en cierre de sesion', 'No habia sesion iniciada');
        }
    }

}
