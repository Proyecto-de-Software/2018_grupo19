<?php

require_once 'TwigView.php';

class SitioEnMantenimiento extends TwigView {

  public function show() {
    echo self::getTwig()->render('sitio-en-mantenimiento.html.twig');
  }
}

?>
