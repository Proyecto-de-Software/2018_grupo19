<?php

require_once 'TwigView.php';

class EdicionPaciente extends TwigView {

  public function show($parametros) {
      echo self::getTwig()->render('edicion-paciente.html.twig',$parametros);
  }
}

?>
