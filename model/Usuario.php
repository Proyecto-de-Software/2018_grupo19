<?php

class Usuario implements IteratorAggregate
{
  public $id;
  public $mail;
  public $nombreUsuario;
  public $activo;
  public $estado;
  public $fechaActualizacion;
  public $fechaCreacion;
  public $nombre;
  public $apellido;

  function __construct($id,$mail,$nombreUsuario,$activo,$fechaActualizacion,$fechaCreacion,$nombre,$apellido)
  {
    $this->id = $id;
    $this->mail = $mail;
    $this->nombreUsuario = $nombreUsuario;
    $this->activo = $activo;
    $this->estado = $activo ? 'Activo' : 'Inactivo';
    $this->fechaActualizacion = $fechaActualizacion;
    $this->fechaCreacion = $fechaCreacion;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
  }

  public static function generarDesdeBD($rowUsuario)
  {
    return new Usuario($rowUsuario['id'],$rowUsuario['email'],$rowUsuario['username'],$rowUsuario['activo'],$rowUsuario['updated_at'],$rowUsuario['created_at'],$rowUsuario['first_name'],$rowUsuario['last_name']);
  }

  public function getIterator()
  {
    return new ArrayIterator($this);
  }
}

?>
