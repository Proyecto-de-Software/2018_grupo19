<?php

require_once 'TwigView.php';

class BusquedaUsuarios extends TwigView {

  public function show() {

    /* Usuarios hardcodeados */
    $adm = array(
      "nombre" => "Administrador",
      "estado" => "Activo",
      "id" => "1"
    );
    $blas = array(
      "nombre" => "Blas Butera",
      "estado" => "Bloqueado",
      "id" => "2"
    );
    $fede = array(
      "nombre" => "Federico Di Claudio",
      "estado" => "Activo",
      "id" => "3"
    );
    $pedro = array(
      "nombre" => "Pedro Dal Bianco",
      "estado" => "Bloqueado",
      "id" => "4"
    );

    $usuarios = array($adm, $blas, $fede, $pedro);

    echo self::getTwig()->render('busqueda-usuarios.html.twig', array('resultados' => $usuarios));
  }
}

?>
