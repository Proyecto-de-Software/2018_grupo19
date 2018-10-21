<?php

require_once 'TwigView.php';

class CreacionPaciente extends TwigView {

  public function show($parametrosDeSesion) {
    echo self::getTwig()->render('creacion-paciente.html.twig', $parametrosDeSesion);
  }
}

?>
