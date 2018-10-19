<?php

require_once 'TwigView.php';

class Home extends TwigView {

    public function showHome() {
        echo self::getTwig()->render('home-sin-loguear.html.twig');
    }

    public function showHomeLogueado(){
        echo self::getTwig()->render('home-logueado.html.twig');
    }

    public function showHomeAdministrador() {
        echo self::getTwig()->render('home-administrador.html.twig');
    }
}

?>
