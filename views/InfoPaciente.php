<?php

require_once 'TwigView.php';

class InfoPaciente extends TwigView {

    public function show($parametros, $nn = false) {
        if ($nn) {
            echo self::getTwig()->render('info-paciente-nn.html.twig',$parametros);
        } else {
            echo self::getTwig()->render('info-paciente.html.twig',$parametros);
        }
    }
}

?>
