<?php

require_once 'model/PDORepository.php';

class UsuariosRepository extends PDORepository {

    public function chequearPermiso($permiso, $idUser) {
        $db = $this->conectarse();

        $query = $db->prepare("SELECT * FROM usuario u INNER JOIN usuario_tiene_rol utr ON(u.id = utr.usuario_id) INNER JOIN rol r ON(utr.rol_id = r.id) INNER JOIN rol_tiene_permiso rtp ON(r.id = rtp.rol_id) INNER JOIN permiso p ON(rtp.permiso_id = p.id) WHERE u.id = ? AND p.nombre = ?");
        $query->execute(array($idUser, $permiso));

        return ($query->rowCount() == 0);
    }

    public function usuarios($nombreUsuario = null, $estado = null) {
      $db = $this->conectarse();

      $sql = "SELECT * FROM usuario u WHERE TRUE";  //El WHERE TRUE es para despues siempre concatenar a la consulta con ANDs
      $parametros = array();

      if ($estado != null){
        $sql = $sql." AND u.activo = ?";
        array_push($parametros,$estado);
      }
      if ($nombreUsuario != null){
        $sql = $sql." AND u.username LIKE ?";
        array_push($parametros,$nombreUsuario.'%');
      }

      $query = $db->prepare($sql);
      $query->execute($parametros);

      return $query->fetchAll();
    }

    public function usuario($id) {
      $db = $this->conectarse();

      $sql = "SELECT * FROM usuario u WHERE u.id = ?";
      $query = $db->prepare($sql);
      $query->execute(array($id));

      return $query->fetch();
    }

    public function crearUsuario($email,$username,$password,$activo,$updated_at,$created_at,$first_name,$last_name) {
      $db = $this->conectarse();
      $sql = "INSERT INTO `usuario` (`email`, `username`, `password`, `activo`, `updated_at`, `created_at`, `first_name`, `last_name`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
      $query = $db->prepare($sql);
      $query->execute(array($email,$username,$password,$activo,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"),$first_name,$last_name));
    }

    public function updateUsuario($id,$email,$username,$activo,$first_name,$last_name) {
      $db = $this->conectarse();
      $sql = "UPDATE `usuario` SET `email` = ?, `activo` = ?, `updated_at` = ?, `first_name` = ?, `last_name` = ?";
      $query = $db->prepare($sql);
      $query->execute(array($email,$activo,date("Y-m-d H:i:s"),$first_name,$last_name));
    }

}
