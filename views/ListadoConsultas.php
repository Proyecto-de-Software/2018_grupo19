<?php

require_once 'TwigView.php';

class ListadoConsultas extends TwigView {

    public function show($consultas) {
        echo self::getTwig()->render('listado-consultas.html.twig', $consultas);
    }

}

?>