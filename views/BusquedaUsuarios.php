<?php

require_once 'TwigView.php';

class BusquedaUsuarios extends TwigView {

  public function show() {

    /* Usuarios hardcodeados */
    $adm = array(
      "nombre" => "Administrador",
      "estado" => "Activo"
    );
    $blas = array(
      "nombre" => "Blas Butera",
      "estado" => "Bloqueado"
    );
    $fede = array(
      "nombre" => "Federico Di Claudio",
      "estado" => "Activo"
    );
    $pedro = array(
      "nombre" => "Pedro Dal Bianco",
      "estado" => "Bloqueado"
    );

    $usuarios = array($adm, $blas, $fede, $pedro);

    echo self::getTwig()->render('busqueda-usuarios.html.twig', array('resultados' => $usuarios));
  }
}

?>
