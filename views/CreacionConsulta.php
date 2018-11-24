<?php

require_once 'TwigView.php';

class CreacionConsulta extends TwigView {

  public function show($parametros) {
      echo self::getTwig()->render('creacion-consulta.html.twig',$parametros);
  }
}

?>
