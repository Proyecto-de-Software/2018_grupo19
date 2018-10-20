<?php

/*
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

require_once 'model/UsuariosRepository.php';
require_once 'controller/RooterController.php';

class UsuarioController extends Controller{

    public function redireccionarBusquedaUsuarios(){
        if(UsuariosRepository::singleton()->chequearPermiso('users_index', $_SESSION['id'])) {
            $view = new BusquedaUsuarios();
            $view->show(UsuariosRepository::singleton()->usuarios(isset($_GET['nombre-de-usuario'])? $_GET['nombre-de-usuario']:null,isset($_GET['estado'])? $_GET['estado']:null));
        } else {
            // Redireccion pantalla de falta de permisos
            echo 'Error de permisos';
        }
    }

    public function redireccionarCreacionUsuario(){

        /* hardcodeados roles que llegarían del modelo */

        $todosLosRoles = array ('Administrador', 'Equipo de guardia');

        $view = new CreacionUsuario();
        $view->show($todosLosRoles);
    }

    public function redireccionarInfoUsuario(){

        /* hardcodeados los roles que llegaría del modelo */

        $roles = array ('Administrador', 'Equipo de guardia');

        $usuario = UsuariosRepository::singleton()->usuario($_GET['id']);

        $view = New InfoUsuario();
        $view->show($usuario);
    }

    public function redireccionarEdicionUsuario(){

        /* hardcodeados los roles para editar */

        $todosLosRoles = array ('Administrador', 'Equipo de guardia');
        $roles = array ('Equipo de guardia');

        $usuario = UsuariosRepository::singleton()->usuario($_GET['id']);

        $view = New EdicionUsuario();
        $view->show($usuario, $todosLosRoles);
    }

    public function insertarUsuario(){
      UsuariosRepository::singleton()->crearUsuario($_POST['email'],$_POST['username'],$_POST['password'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido']);
      RooterController::singleton()->redireccionar('busqueda-usuarios');
    }

    public function actualizarUsuario(){
      UsuariosRepository::singleton()->actualizarUsuario($_GET['id'],$_POST['email'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido']);
      RooterController::singleton()->redireccionar('busqueda-usuarios');
    }
}
