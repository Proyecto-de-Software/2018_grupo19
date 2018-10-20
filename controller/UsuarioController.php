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

        /* hardcodeados roles que llegarían del modelo */

        $todosLosRoles = array ('Administrador', 'Equipo de guardia');

        $view = new CreacionUsuario();
        $view->show($todosLosRoles);
    }

    public function redireccionarInfoUsuario(){

        /* hardcodeado user que llegaría del modelo */

        $roles = array ('Administrador', 'Equipo de guardia');

        $usuario = array(
            'roles' => $roles,
            'nombre' => 'Juan',
            'apellido' => 'Pelotas',
            'email' => 'JuanPelotas@gmail.com',
            'estado' => 'Bloqueado'
        );

        $view = New InfoUsuario();
        $view->show($usuario);
    }

    public function redireccionarEdicionUsuario(){

        /* hardcodeado user para editar */

        $todosLosRoles = array ('Administrador', 'Equipo de guardia');
        $roles = array ('Equipo de guardia');

        $usuario = array(
            'roles' => $roles,
            'nombre' => 'Juan',
            'apellido' => 'Pelotas',
            'email' => 'JuanPelotas@gmail.com',
            'estado' => 'Bloqueado'
        );

        $view = New EdicionUsuario();
        $view->show($usuario, $todosLosRoles);
    }
}
