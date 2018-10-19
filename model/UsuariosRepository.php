<?php

/*
    Clase que realiza las consultas sobre la BD y crea los objetos (Para manejo de sesiones)
*/
require_once 'model/Usuario.php';

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

        return ($query->rowCount() == 0);
    }

    public function usuarios($nombreUsuario = null, $estado = null) {
      $db = $this->conectarse();

      $sql = "SELECT * FROM usuario u";
      $parametros = array();

      if ($estado != null){
        $sql = $sql." WHERE u.activo = ?";
        array_push($parametros,$estado);
        if ($nombreUsuario != null){
          $sql = $sql." AND u.username LIKE ?";
          array_push($parametros,$nombreUsuario.'%');
        }
      } else {
        if ($nombreUsuario != null){
          $sql = $sql." WHERE u.username LIKE ?";
          array_push($parametros,$nombreUsuario.'%');
        }
      }
      
      $query = $db->prepare($sql);
      $query->execute($parametros);

      return (array_map('Usuario::generarDesdeBD',$query->fetchAll()));
    }


}
