<?php

require_once 'controller/RooterController.php';
require_once 'views/ListadoRoles.php';
require_once 'views/InfoRol.php';
require_once 'views/EditarRol.php';
require_once 'model/RolesRepository.php';

class RolController extends Controller{

    public function redireccionarListadoRoles(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_index', $_SESSION['id'])){
            ListadoRoles::show($this->parametrosDeSesion(array('roles' => RolesRepository::singleton()->getAllRoles())));
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para acceder al listado de roles');
        }
    }

    public function redireccionarInfoRol(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_show', $_SESSION['id'])){
            $permisos = RolesRepository::singleton()->getPermisosByRol($_GET['id']);
            $rol = RolesRepository::singleton()->getRolById($_GET['id']);
            $rol['permisos'] = $permisos;
            InfoRol::show($this->parametrosDeSesion(array('rol' => $rol)));
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para acceder a la información de un rol');
        }
    }

    public function redireccionarEditarRol(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_update', $_SESSION['id'])){
            $allPermisos = RolesRepository::singleton()->getPermisos();
            $userPermisos = RolesRepository::singleton()->getPermisosByRol($_GET['id']);
            $rol = RolesRepository::singleton()->getRolById($_GET['id']);
            $rol['permisos'] = $userPermisos;
            $datosEditarRol = array('allPermisos' => $allPermisos, 'rol' =>$rol);
            EditarRol::show($this->parametrosDeSesion(array('datosEditarRol'=>$datosEditarRol)));
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para editar un rol');
        }
    }

    public function redireccionarCrearRol(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_new', $_SESSION['id'])){
            $allPermisos = RolesRepository::singleton()->getPermisos();
            CrearRol::show($this->parametrosDeSesion(array('permisos'=>$allPermisos)));
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para crear un rol');
        }
    }

    public function editarRol(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_update', $_SESSION['id'])){
            $permisos = RolesRepository::singleton()->getPermisos();
            $permisosUpdated = array();

            foreach ($permisos as $permiso) {
                $permisosUpdated[$permiso['id']] = isset($_POST['permiso-'.$permiso['id']]);
            }

            foreach ($permisosUpdated as $idPermiso => $bool) {
                if($bool){
                    if(!RolesRepository::singleton()->rolTienePermiso($_GET['id'], $idPermiso)){
                        RolesRepository::singleton()->setPermisoAlRol($_GET['id'], $idPermiso);
                    }
                }else{
                    if(RolesRepository::singleton()->rolTienePermiso($_GET['id'], $idPermiso)){
                        RolesRepository::singleton()->quitarPermisoAlRol($_GET['id'], $idPermiso);
                    }
                }
            }
            header("location:index.php?comando=info-rol&id=" . $_GET['id']);
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para editar un rol');
        }

    }

    public function borrarRol(){
        if(UsuariosRepository::singleton()->chequearPermiso('rol_delete', $_SESSION['id'])){
            try {
                RolesRepository::singleton()->borrarRol($_GET['id']);
                header("location:index.php?comando=listado-roles");
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para borrar un rol');
        }
    }

    public function crearRol(){

        if(UsuariosRepository::singleton()->chequearPermiso('rol_new', $_SESSION['id'])){
            RolesRepository::singleton()->crearRol($_POST['rolname']);

            $idRolCreado = RolesRepository::singleton()->getRolByName($_POST['rolname'])['id'];
    
            $permisos = RolesRepository::singleton()->getPermisos();
            $permisosUpdated = array();
    
            foreach ($permisos as $permiso) {
                if(isset($_POST['permiso-'.$permiso['id']])){
                    RolesRepository::singleton()->setPermisoAlRol($idRolCreado, $permiso['id']);
                }
            }
    
            header("location:index.php?comando=info-rol&id=$idRolCreado"); 
        }else{
            $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para acceder borrar un rol');
        }       
    }

}

?>