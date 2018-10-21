<?php

require_once 'TwigView.php';

class InfoUsuario extends TwigView {

    public function show($parametros) {
        echo self::getTwig()->render('info-usuario.html.twig',$parametros);
    }
}

?>
