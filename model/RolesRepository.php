<?php

/*
Clase que realiza las operaciones sobre la BD correspondientes a roles y permisos
*/

require_once 'model/PDORepository.php';

class RolesRepository extends PDORepository {

    public function getAllRoles(){
        $db = $this->conectarse();
        $query = $db->prepare("SELECT * FROM `rol`");
        $query->execute();
        return ($query->fetchAll());
    }

    public function getRolesUsuario($id) {
        $db = $this->conectarse();
        $query = $db->prepare("SELECT * FROM rol r INNER JOIN usuario_tiene_rol utr ON(r.id = utr.rol_id) WHERE utr.usuario_id = ? ");
        $query->execute(array($id));
        return ($query->fetchAll());
    }

    public function getRolConPermisos($id){ //Se dejó de usar
        $db = $this->conectarse();
        $query = $db->prepare("select r.id as rolId, r.nombre as rolNombre, p.id as permisoId, p.nombre as permisoNombre from rol r inner join rol_tiene_permiso rtp on (r.id = rtp.rol_id) inner join permiso p on (rtp.permiso_id = p.id) where r.id = ?");
        $query->execute(array($id));

    }

    public function getPermisosByRol($idRol){
        $db = $this->conectarse();
        $query = $db->prepare("select p.id, p.nombre from permiso p inner join rol_tiene_permiso rtp on (p.id = rtp.permiso_id) where rtp.rol_id = ?");
        $query->execute(array($idRol));
        return ($query->fetchAll());
    }

    public function getRolById($idRol){
        $db = $this->conectarse();
        $query = $db->prepare("select * from rol where id = ?");
        $query->execute(array($idRol));
        return $query->fetch();
    }

    public function getPermisos(){
        $db = $this->conectarse();
        $query = $db->prepare("select * from permiso");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCantPermisos(){ //ya no se usa
        $db = $this->conectarse();
        $query = $db->prepare("select count(*) from permiso");
        $query->execute();
        return $query->fetch();
    }

    public function rolTienePermiso($idRol, $idPermiso) {
        $db = $this->conectarse();
        $query = $db->prepare("select * from rol_tiene_permiso where rol_id = ? and permiso_id = ?");
        $query->execute(array($idRol, $idPermiso));
        return (!$query->rowCount() == 0);
    }

    public function setPermisoAlRol($idRol, $idPermiso){
        $db = $this->conectarse();
        $query = $db->prepare("insert into rol_tiene_permiso (rol_id, permiso_id) values (?, ?)");
        $query->execute(array($idRol, $idPermiso));
    }

    public function quitarPermisoAlRol($idRol, $idPermiso){
        $db = $this->conectarse();
        $query = $db->prepare("delete from rol_tiene_permiso where rol_id = ? and permiso_id = ?");
        $query->execute(array($idRol, $idPermiso));
    }
    
    public function borrarTodosLosPermisosDelRol($idRol){
        $db = $this->conectarse();
        $query = $db->prepare("delete from rol_tiene_permiso where rol_id = ?");
        $query->execute(array($idRol));
    }

    public function borrarRol($idRol){
        $db = $this->conectarse();
        $query = $db->prepare("select * from usuario_tiene_rol where rol_id = ?");
        $query->execute(array($idRol));
        if($query->rowCount() > 0){
            throw new Exception("No se puede borrar el rol ya que un usuario lo tiene asignado.");
        }else{
            $this->borrarTodosLosPermisosDelRol($idRol);
            $query = $db->prepare("delete from rol where id = ?");
            $query->execute(array($idRol));
        }
    }

    public function crearRol($rolName){
        $db = $this->conectarse();
        $query = $db->prepare("insert into rol (nombre) values (?)");
        $query->execute(array($rolName)); 
    }

    public function getRolByName($rolName){
        $db = $this->conectarse();
        $query = $db->prepare("select * from rol where nombre = ?");
        $query->execute(array($rolName));
        return $query->fetch();
    }

}
