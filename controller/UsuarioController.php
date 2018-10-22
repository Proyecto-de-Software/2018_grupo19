<?php

/*
**  Controladores relacionados a tareas especificas a realizar con el usuario
*/

require_once 'model/UsuariosRepository.php';
require_once 'model/RolesRepository.php';
require_once 'controller/RooterController.php';
require_once 'controller/RooterController.php';

class UsuarioController extends Controller{

    public function redireccionarBusquedaUsuarios(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_index', $_SESSION['id'])) {
                $result = UsuariosRepository::singleton()->usuarios(isset($_GET['nombre-de-usuario'])? $_GET['nombre-de-usuario']:null , isset($_GET['estado'])? $_GET['estado']:null, isset($_GET["pagina-actual"]) ? ($_GET['pagina-actual'] - 1):0 );
                $view = new BusquedaUsuarios();
                $view->show($this->parametrosDeSesion(array('resultados' => $result["usuarios"], 'paginaActual' => isset($_GET['pagina-actual']) ? $_GET['pagina-actual']:1, 'cantidadPaginas' => $result["cantidadTotal"], "nombreDeUsuario" => isset($_GET["nombre-de-usuario"])? $_GET["nombre-de-usuario"]:null , "estado" => isset($_GET["estado"])? $_GET["estado"]:null )));
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la busqueda de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function redireccionarCreacionUsuario(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_new', $_SESSION["id"])) {
                $todosLosRoles = RolesRepository::singleton()->getAllRoles();
                $view = new CreacionUsuario();
                $view->show($this->parametrosDeSesion(array('roles' => $todosLosRoles)));
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la creacion de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function redireccionarInfoUsuario(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_show', $_SESSION["id"])) {
                $usuario = UsuariosRepository::singleton()->usuario($_GET['id']);
                $rolesUsuario = RolesRepository::singleton()->getRolesUsuario($_GET['id']);
                $view = New InfoUsuario();
                $view->show($this->parametrosDeSesion(array('usuario' => $usuario, 'roles' => $rolesUsuario)));
            } else {
                 $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la informacion de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function redireccionarEdicionUsuario(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_update', $_SESSION["id"])) {
                $usuario = UsuariosRepository::singleton()->usuario($_GET['id']);
                $todosLosRoles = RolesRepository::singleton()->getAllRoles();
                $rolesUsuario = RolesRepository::singleton()->getRolesUsuario($_GET['id']);
                $view = New EdicionUsuario();
                $view->show($this->parametrosDeSesion(array('usuario' => $usuario, 'todoslosroles' => $todosLosRoles, 'rolesUsuario' => $rolesUsuario)));
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la edicion de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function insertarUsuario(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_new', $_SESSION["id"])) {
                if(UsuariosRepository::singleton()->validarNombreUsuario($_POST['username'])) {
                    UsuariosRepository::singleton()->crearUsuario($_POST['email'],$_POST['username'],$_POST['password'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido'],$_POST['roles']);
                    RooterController::singleton()->redireccionar('busqueda-usuarios');
                } else {
                    $this->redireccionarError('Error en la creacion', 'El nombre de usuario ya existe en el sistema');
                }
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para accceder a la edicion de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }

    public function actualizarUsuario(){
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_update', $_SESSION["id"])) {
                UsuariosRepository::singleton()->actualizarUsuario($_GET['id'],$_POST['email'],!isset($_POST['bloqueado']),$_POST['nombre'],$_POST['apellido'],isset($_POST['roles'])?$_POST['roles']:null);
                RooterController::singleton()->redireccionar('busqueda-usuarios');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de usuarios');
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }
    }

    public function borrarUsuario() {
        try {
            if(UsuariosRepository::singleton()->chequearPermiso('usuario_destroy', $_SESSION["id"])) {
                UsuariosRepository::singleton()->borrarUsuario($_GET['id']);
                RooterController::singleton()->redireccionar('busqueda-usuarios');
            } else {
                $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para borrar un usuario'); 
            }
        } catch (Exception $e) {
            $this->redireccionarError('Error en la base de datos', $e->getMessage());
        }

    }
}
