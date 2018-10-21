<?php

/*
    Clase que realiza las operaciones sobre la BD correspondientes a roles y permisos
*/

require_once 'model/PDORepository.php';

class RolesRepository extends PDORepository {

    public function getAllRoles(){
        if(null !== ($db = $this->conectarse())) {
            $query = $db->prepare("SELECT * FROM `rol`");
            $query->execute();
            return ($query->fetchAll());
        } else {
            return null;
        }
    }

    public function getRolesUsuario($id) {
        if(null !== ($db = $this->conectarse())) {
            $query = $db->prepare("SELECT nombre FROM rol r INNER JOIN usuario_tiene_rol utr ON(r.id = utr.rol_id) WHERE utr.usuario_id = ? ");
            $query->execute(array($id));
            return ($query->fetchAll());
        } else {
            return null;
        }
    }

}
