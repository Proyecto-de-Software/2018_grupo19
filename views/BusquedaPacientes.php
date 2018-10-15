<?php

require_once 'TwigView.php';

class BusquedaPacientes extends TwigView {

  public function show() {
    echo self::getTwig()->render('busqueda-pacientes.html.twig');
  }
}

?>
