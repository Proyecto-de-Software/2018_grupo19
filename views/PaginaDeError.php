<?php

require_once 'TwigView.php';

class PaginaDeError extends TwigView {

    public function show($parametros) {
        echo self::getTwig()->render('error.html.twig',$parametros);
    }
}

?>
