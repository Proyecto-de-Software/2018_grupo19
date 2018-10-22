<?php

require_once 'model/PDORepository.php';

class UsuariosRepository extends PDORepository {

    public function chequearPermiso($permiso, $idUser) {
        if( null !== ($db = $this->conectarse())) {
            $query = $db->prepare("SELECT * FROM usuario u INNER JOIN usuario_tiene_rol utr ON(u.id = utr.usuario_id) INNER JOIN rol r ON(utr.rol_id = r.id) INNER JOIN rol_tiene_permiso rtp ON(r.id = rtp.rol_id) INNER JOIN permiso p ON(rtp.permiso_id = p.id) WHERE u.id = ? AND p.nombre = ?");
            $query->execute(array($idUser, $permiso));
            return (!$query->rowCount() == 0);
        } else {
            return null;
        }
    }

    public function usuarios($nombreUsuario = null, $estado = null, $paginaActual) {
      if (null !== ($db = $this->conectarse())) {
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
        $cantidadPaginas = ceil( $query->rowCount() / $this->cantidadPorPagina() );

        $primero = ($paginaActual * $this->cantidadPorPagina() );
        $sql = $sql . " LIMIT " . $primero . ', ' . (($this->cantidadPorPagina()) );
        $query = $db->prepare($sql);
        $query->execute($parametros);
        $result = array("cantidadTotal" => $cantidadPaginas, "usuarios" => $query->fetchAll());
        return $result;
      } else {
        return null;
    }

  }

    public function usuario($id) {
        if (null !== ($db = $this->conectarse())) {
            $sql = "SELECT * FROM usuario u WHERE u.id = ?";
            $query = $db->prepare($sql);
            $query->execute(array($id));
            return $query->fetch();
        } else {
            return null;
        }
    }

    public function idDeNombreDeUsuario($username) {
        if (null !== ($db = $this->conectarse())) {
            $sql = "SELECT * FROM usuario u WHERE u.username = ?";
            $query = $db->prepare($sql);
            $query->execute(array($username));
            return ($query->fetch())['id'];
        } else {
            return null;
        }
    }

    public function crearUsuario($email,$username,$password,$activo,$first_name,$last_name,$roles) {
        if (null !== ($db = $this->conectarse())) {
            $sql = "INSERT INTO `usuario` (`id`, `email`, `username`, `password`, `activo`, `updated_at`, `created_at`, `first_name`, `last_name`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $db->prepare($sql);
            $query->execute(array($email,$username,$password,$activo,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"),$first_name,$last_name));

            $this->agregarRoles($this->idDeNombreDeUsuario($username),$roles);

            return true;
        } else {
            return null;
        }
    }

    public function actualizarUsuario($id,$email,$activo,$first_name,$last_name,$roles) {
        if (null !== ($db = $this->conectarse())) {
            $sql = "UPDATE `usuario` SET `email` = ?, `activo` = ?, `updated_at` = ?, `first_name` = ?, `last_name` = ? WHERE usuario.id = $id";
            $query = $db->prepare($sql);
            $query->execute(array($email,$activo,date("Y-m-d H:i:s"),$first_name,$last_name));
            $this->limpiarRoles($id);
            if ($roles) {
                $this->agregarRoles($id,$roles);
            }
            return true;
        } else {
            return null;
        }
    }

    public function borrarUsuario($id) {
        if (null !== ($db = $this->conectarse())) {
            $query = $db->prepare("DELETE FROM `usuario_tiene_rol` WHERE usuario_id = ?");
            $query->execute(array($id));
            $query = $db->prepare("DELETE FROM `usuario` WHERE id = ?");
            $query->execute(array($id));
            return true;
        } else {
            return null;
        }
    }

    public function limpiarRoles($id) {
        if (null !== ($db = $this->conectarse())) {
            $query = $db->prepare("DELETE FROM `usuario_tiene_rol` WHERE usuario_id = ?");
            $query->execute(array($id));
            return true;
        } else {
            return null;
        }
    }

    public function agregarRoles($idUsuario,$roles) {
        $this->limpiarRoles($idUsuario);
        foreach ($roles as $key => $rol) {
            $this->agregarRol($idUsuario,$rol);
        }
    }

    public function agregarRol($idUsuario,$idRol) {
        if (null !== ($db = $this->conectarse())) {
            $sql = "INSERT INTO `usuario_tiene_rol` (`usuario_id`, `rol_id`) VALUES (?, ?)";
            $query = $db->prepare($sql);
            $query->execute(array($idUsuario,$idRol));
            return true;
        } else {
            return null;
        }
    }

}
