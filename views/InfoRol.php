<?php

require_once 'TwigView.php';

class InfoRol extends TwigView {

    public function show($rol) {
        echo self::getTwig()->render('info-rol.html.twig', $rol);
    }
}

?>
