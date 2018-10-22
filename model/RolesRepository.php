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

}
