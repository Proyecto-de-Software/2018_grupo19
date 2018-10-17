<?php

/*
    Clase que realiza las consultas sobre la BD y crea los objetos (Para manejo de sesiones)
*/
require 'model/PDORepository.php';

class SesionRepository extends PDORepository{

    public function iniciarSesion($usuario, $contrasena) {
      $db = $this->conectarse();
      $query = $db->prepare("SELECT * FROM usuario WHERE username = ? AND password = ?");
      $query->execute(array($usuario, $contrasena));
      if (!$query) {
        return false;
      } else {
        while ($fila = $query->fetch()) {
          $_SESSION['id'] = $fila["id"];
          $_SESSION['username'] = $fila['username'];
          $_SESSION['activo'] = $fila['activo'];
          $_SESSION['first_name'] = $fila['first_name'];
          $_SESSION['last_name'] = $fila['last_name'];
        }
        return true;
      }
    }

}
