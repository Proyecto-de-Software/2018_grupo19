<?php

require_once 'TwigView.php';

class Configuracion extends TwigView {

  public function show($configuracion) {
    echo self::getTwig()->render('configuracion.html.twig', $configuracion);
  }
}

?>
