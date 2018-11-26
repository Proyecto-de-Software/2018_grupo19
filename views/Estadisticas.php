<?php

require_once 'TwigView.php';

class Estadisticas extends TwigView {

    public function show($parametros) {
        echo self::getTwig()->render('estadisticas.html.twig',$parametros);
    }
}

?>