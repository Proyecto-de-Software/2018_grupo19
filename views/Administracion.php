<?php

require_once 'TwigView.php';

class Administracion extends TwigView {

    public function show() {
        echo self::getTwig()->render('home-administrador.html.twig');
    }
}

?>
