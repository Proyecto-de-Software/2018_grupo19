<?php

/*
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

require_once 'model/UsuariosRepository.php';

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
        $view = new CreacionUsuario();
        $view->show();
    }
}
