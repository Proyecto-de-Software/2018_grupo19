<?php

require_once 'TwigView.php';

class CreacionPacienteNN extends TwigView {

  public function show($parametrosDeSesion) {
    echo self::getTwig()->render('creacion-paciente-nn.html.twig', $parametrosDeSesion);
  }
}

?>
