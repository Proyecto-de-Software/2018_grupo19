<?php

require_once 'TwigView.php';

class EdicionUsuario extends TwigView {

  public function show() {
    echo self::getTwig()->render('edicion-usuario.html.twig');
  }
}

?>
