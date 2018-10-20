<?php

/*
    Clase que realiza las operaciones sobre la BD correspondientes a roles y permisos
*/

require_once 'model/PDORepository.php';

class RolesRepository extends PDORepository {

    public function getAllRoles(){
        if(null !== ($db = $this->conectarse())) {
            $query = $db->prepare("SELECT nombre FROM `roles`");
            $query->execute();
            return ($query->fetchAll());
        } else {
            return null;
        }
    }

}