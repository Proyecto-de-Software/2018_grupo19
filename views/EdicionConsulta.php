<?php

require_once 'TwigView.php';

class EdicionConsulta extends TwigView {

  public function show($parametros) {
    echo self::getTwig()->render('edicion-consulta.html.twig',$parametros);
  }
}

?>
