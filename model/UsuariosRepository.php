<?php

/*
    Clase que realiza las consultas sobre la BD y crea los objetos (Para manejo de sesiones)
*/
//require 'model/PDORepository.php';

class UsuariosRepository extends PDORepository {

    private static $singleton;

    // Metodo para acceder al singleton
    public static function singleton() {
        if(!isset(self::$singleton)){
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    public function chequearPermiso($permiso, $idUser) {
        $db = $this->conectarse();
        
        $query = $db->prepare("SELECT * FROM usuario u INNER JOIN usuario_tiene_rol utr ON(u.id = utr.usuario_id) INNER JOIN rol r ON(utr.rol_id = r.id) INNER JOIN rol_tiene_permiso rtp ON(r.id = rtp.rol_id) INNER JOIN permiso p ON(rtp.permiso_id = p.id) WHERE u.id = ? AND p.nombre = ?");
        $query->execute(array($idUser, $permiso));
        
        if($query->rowCount() == 0) { return false;}
        else { return true; }
    }
}