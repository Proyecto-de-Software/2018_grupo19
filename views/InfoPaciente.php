<?php

require_once 'TwigView.php';

class InfoPaciente extends TwigView {

    public function show($parametros) {
        echo self::getTwig()->render('info-paciente.html.twig',$parametros);
    }
}

?>
