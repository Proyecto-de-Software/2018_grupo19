<?php

require_once 'TwigView.php';

class CreacionPaciente extends TwigView {

  public function show() {
    echo self::getTwig()->render('creacion-paciente.html.twig');
  }
}

?>
