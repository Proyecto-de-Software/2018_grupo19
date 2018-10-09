<?php

/*
    Clase que realiza las consultas sobre la BD y crea los objetos (Para manejo de sesiones)
*/
require 'PDORepository.php';

class SesionRepository extends PDORepository{

    public function iniciarSesion($usuario, $contrasena) {
      $db = $this->conectarse();
      $resultado = $db->query("SELECT * FROM usuario WHERE username = '$usuario' AND password = '$contrasena'");
      if (!$resultado) {
        // Hacer algo si usuario o contrasenia erroneos
      } else {
        while ($fila = $resultado->fetch()) {
          session_start();
          $_SESSION['usuario'] = $fila['username'];
        }
      }
    }

}
