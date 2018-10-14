<?php

require_once 'TwigView.php';

class CreacionUsuario extends TwigView {

  public function show() {
    echo self::getTwig()->render('creacion-usuario.html.twig');
  }
}

?>
