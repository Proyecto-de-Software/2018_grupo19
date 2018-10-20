<?php

/*
    Clase que realiza las consultas sobre la BD y crea los objetos (Para manejo de sesiones)
*/

require_once 'model/PDORepository.php';

class SesionRepository extends PDORepository{

  public function iniciarSesion($usuario, $contrasena) {
    if ( null !== ($db = $this->conectarse())) {
      $query = $db->prepare("SELECT * FROM usuario WHERE username = ? AND password = ?");
      $query->execute(array($usuario, $contrasena));
      if ($query->rowCount() == 0) {
        return false;
      } else {
        $fila = $query->fetch();
        if ($fila['activo'] == 0) {
          $_SESSION['id'] = $fila["id"];
          $_SESSION['username'] = $fila['username'];
          $_SESSION['activo'] = $fila['activo'];
          $_SESSION['first_name'] = $fila['first_name'];
          $_SESSION['last_name'] = $fila['last_name'];
          $_SESSION['administrador'] = $this->isAdministrador($fila["id"]);
          return true;
        } else {echo 'Usuario bloqueado - '; return false;}
      }
    } else {return null;}
  }

  public function isAdministrador($id) {
    $db = $this->conectarse();
    $query = $db->prepare("SELECT r.nombre FROM usuario u INNER JOIN usuario_tiene_rol utr ON (u.id = utr.usuario_id) INNER JOIN rol r ON (utr.rol_id = r.id) WHERE u.id = ?");
    $query->execute(array($id));
    while($rol = $query->fetch()) {
      if($rol['nombre'] == 'Administrador') {return true;}
    }
    return false;
  }

}
