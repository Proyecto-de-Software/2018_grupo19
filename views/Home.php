<?php

require_once 'TwigView.php';

class Home extends TwigView {

    public function show($parametrosDeSesion) {
      if (!$parametrosDeSesion['logueado']) {
        echo self::getTwig()->render('home-sin-loguear.html.twig');
      } elseif (!$parametrosDeSesion['administrador']) {
        echo self::getTwig()->render('home-logueado.html.twig');
      } else {
        echo self::getTwig()->render('home-administrador.html.twig');
      }
    }
}

?>
