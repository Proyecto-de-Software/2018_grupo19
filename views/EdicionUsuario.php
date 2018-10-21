<?php

require_once 'TwigView.php';

class EdicionUsuario extends TwigView {

  public function show($parametros) {
    echo self::getTwig()->render('edicion-usuario.html.twig',$parametros);
  }
}

?>
