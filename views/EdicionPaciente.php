<?php

require_once 'TwigView.php';

class EdicionPaciente extends TwigView {

  public function show() {
    echo self::getTwig()->render('edicion-paciente.html.twig');
  }
}

?>
