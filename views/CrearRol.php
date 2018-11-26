<?php

require_once 'TwigView.php';

class CrearRol extends TwigView {

    public function show($permisos) {
        echo self::getTwig()->render('crear-rol.html.twig', $permisos);
    }
}

?>
