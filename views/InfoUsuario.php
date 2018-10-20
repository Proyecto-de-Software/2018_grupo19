<?php

require_once 'TwigView.php';

class InfoUsuario extends TwigView {

    public function show($usuario) {
        echo self::getTwig()->render('info-usuario.html.twig', array('usuario' => $usuario));
    }
}

?>