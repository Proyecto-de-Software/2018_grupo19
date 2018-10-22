<?php

require_once 'TwigView.php';

class EdicionPaciente extends TwigView {

  public function show($parametros) {
      //echo '<pre>' , var_dump($parametros) , '</pre>';
      echo self::getTwig()->render('edicion-paciente.html.twig',$parametros);
  }
}

?>
