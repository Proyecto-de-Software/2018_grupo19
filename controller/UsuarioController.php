<?php

/*
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

require_once 'model/UsuariosRepository.php';
require_once 'controller/RooterController.php';

class UsuarioController extends Controller{

    public function redireccionarBusquedaUsuarios(){
        if(UsuariosRepository::singleton()->chequearPermiso('usuario_index', $_SESSION['id'])) {
            if( null !== ($result = UsuariosRepository::singleton()->usuarios(isset($_GET['nombre-de-usuario'])? $_GET['nombre-de-usuario']:null,isset($_GET['estado'])? $_GET['estado']:null))) {
                $view = new BusquedaUsuarios();
                $view->show($result);
            } else {
                echo 'Error en la bd';
            }
        } else {
            // Redireccion pantalla de falta de permisos
            echo 'Error de permisos';
        }
    }

    public function redireccionarCreacionUsuario(){
        if(UsuariosRepository::singleton()->chequearPermiso('usuario_new', $_SESSION["id"])) {
            if(null !== ($todosLosRoles = RolesRepository::singleton()->getAllRoles())) {
                $view = new CreacionUsuario();
                $view->show($todosLosRoles);
            } else {
                echo 'error en la bd';
            }       
        } else {
            echo 'no se tienen los permisos';
        }
    }

    public function redireccionarInfoUsuario(){
        if(UsuariosRepository::singleton()->chequearPermiso('usuario_show', $_SESSION["id"])) {
            if(null !== ($usuario = UsuariosRepository::singleton()->usuario($_GET['id']))) {
                $view = New InfoUsuario();
                $view->show($usuario);
            } else { echo 'error en la bd'; }
        } else { echo 'no se tiene permisos'; }
    }

    public function redireccionarEdicionUsuario(){
        if(UsuariosRepository::singleton()->chequearPermiso('usuario_update', $_SESSION["id"])) {
            if((null !== ($usuario = UsuariosRepository::singleton()->usuario($_GET['id']))) && (null !== ($todosLosRoles = RolesRepository::singleton()->getAllRoles())) ) {
                $view = New EdicionUsuario();
                $view->show($usuario, $todosLosRoles);
            } else { echo 'error en la bd'; }
        } else { echo 'no se tiene permisos'; }
    }

    public function insertarUsuario(){
        UsuariosRepository::singleton()->crearUsuario($_POST['email'],$_POST['username'],$_POST['password'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido']);
        RooterController::singleton()->redireccionar('busqueda-usuarios');
    }

    public function actualizarUsuario(){
        if(UsuariosRepository::singleton()->chequearPermiso('usuario_update', $_SESSION["id"])) {
            if (null !== UsuariosRepository::singleton()->actualizarUsuario($_GET['id'],$_POST['email'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido'])) {
                RooterController::singleton()->redireccionar('busqueda-usuarios');
            } else { echo 'error en la bd'; }
        } else { echo 'no se tiene permisos'; }
    }
}
