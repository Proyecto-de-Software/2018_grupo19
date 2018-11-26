<?php

require_once 'TwigView.php';

class InstitucionesMap extends TwigView {
    public function show() {
        echo self::getTwig()->render('mapa-instituciones.html.twig');
    }
}

?>
